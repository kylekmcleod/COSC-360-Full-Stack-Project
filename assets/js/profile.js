document.addEventListener('DOMContentLoaded', () => {
    console.log('Fetching user profile data...');
    
    const profileContainer = document.getElementById('profile-container');
    profileContainer.innerHTML = `
        <div class="loading-message" style="text-align: center; padding: 20px;">
            <h2>Loading profile...</h2>
            <p>Please wait while we fetch your profile data.</p>
        </div>
    `;
    
    fetch('../src/controllers/UserController.php')
        .then(response => {
            console.log('Response status:', response.status);
            
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            
            return response.text().then(text => {
                try {
                    console.log('Raw response:', text);
                    
                    if (text.trim().indexOf('{') !== 0 && text.trim().indexOf('[') !== 0) {
                        throw new Error(`Invalid JSON response: ${text}`);
                    }
                    
                    return JSON.parse(text);
                } catch (e) {
                    console.error('JSON parse error:', e);
                    throw new Error(`Invalid JSON response: ${text}`);
                }
            });
        })
        .then(userData => {
            if (userData.error) {
                console.error('API error:', userData.error);
                throw new Error(userData.error);
            }
            
            console.log('Profile data loaded successfully:', userData);
            
            if (typeof userData !== 'object' || userData === null) {
                throw new Error('Invalid user data format');
            }
            
            const user = {
                first_name: userData.first_name || 'User',
                last_name: userData.last_name || '',
                username: userData.username || 'user',
                bio: userData.bio || '',
                date_of_birth: userData.date_of_birth || 'N/A',
                location: userData.location || 'N/A',
                website_url: userData.website_url || '#',
                website_display: userData.website_url || 'N/A',
                posts_count: userData.posts_count || 0,
                following_count: userData.following_count || 0,
                followers_count: userData.followers_count || 0
            };
            
            const bannerImage = '../assets/images/kobeBannerHorizontal.jpg';
            
            const profileImg = typeof profileImageUrl !== 'undefined' && profileImageUrl ? profileImageUrl : 
                              (userData.profile_picture || '../assets/images/profile-image-4.jpg');
            
            profileContainer.innerHTML = `
                <h1 class="profile-panel__header">Profile</h1>
                <div class="profile__banner">
                    <img src="${bannerImage}" alt="Banner Image" class="profile__banner-image" />
                    <img src="${profileImg}" alt="Profile Image" class="profile__profile-image" />
                </div>
                <div class="profile-panel">
                    <div class="profile-panel__block">
                        <div class="profile-panel__info">
                            <div class="profile-panel__heading">${user.first_name} ${user.last_name}</div>
                            <div class="profile-panel__username">@${user.username}</div>
                        </div>
                        <a href="settings.php" class="profile-panel__edit">EDIT</a>
                    </div>
                    <div class="profile-panel__about">
                        About:
                    </div>
                    <div class="profile-panel__about-text">
                        ${user.bio ? user.bio : 'No bio available. Click EDIT to add a bio.'}
                    </div>
                    <div class="profile-panel__details">
                        <div>Date of Birth: ${user.date_of_birth}</div>
                        <div>Location: ${user.location}</div>
                        <div>Website: <a href="${user.website_url}" target="_blank">${user.website_display}</a></div>
                    </div>
                </div>
                
                <div id="user-posts">
                    <h2 class="posts-header">Posts</h2>
                    <div class="loading-posts">Loading posts...</div>
                </div>
            `;
            
            return fetch('../src/controllers/UserPostsController.php')
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error fetching posts! Status: ${response.status}`);
                    }
                    return response.text().then(text => {
                        console.log('Raw posts response:', text);
                        
                        try {
                            if (!text.trim()) {
                                return [];
                            }
                            
                            if (text.trim().indexOf('{') !== 0 && text.trim().indexOf('[') !== 0) {
                                throw new Error(`Invalid JSON response: ${text}`);
                            }
                            
                            return JSON.parse(text);
                        } catch (e) {
                            console.error('JSON parse error:', e);
                            throw new Error(`Invalid JSON response: ${text}`);
                        }
                    });
                });
        })
        .then(posts => {
            console.log('User posts loaded:', posts);
            
            const userPostsContainer = document.getElementById('user-posts');
            
            if (!posts || posts.length === 0) {
                userPostsContainer.innerHTML = `
                    <h2 class="posts-header">Posts</h2>
                    <div class="no-posts">No posts yet</div>
                `;
                return;
            }
            
            let postsHTML = `<h2 class="posts-header">Posts</h2>`;
            
            posts.forEach(post => {
                const postProfilePic = post.profile_picture || '../assets/images/defaultProfilePic.png';
                
                postsHTML += `
                <div class="post">
                    <img class="post__author-logo" src="${postProfilePic}" alt="${post.username}'s profile" />
                    <div class="post__main">
                        <div class="post__header">
                            <div class="post__author-name">
                                ${post.username}
                            </div>
                            <div class="post__author-slug">
                                @${post.username}
                            </div>
                            <div class="post__publish-time">
                                ${post.time_display}
                            </div>
                        </div>
                        <div class="post__content">
                            ${post.content}
                        </div>
                        <div class="post__actions">
                            <div class="post__action-button">
                                <img src="../assets/svg/comment.svg" class="post__action-icon" />
                                <span class="post__action-count">${post.comment_count}</span>
                            </div>
                            <div class="post__action-button">
                                <img src="../assets/svg/heart.svg" class="post__action-icon" />
                                <span class="post__action-count">${post.like_count}</span>
                            </div>
                        </div>
                    </div>
                </div>
                `;
            });
            
            userPostsContainer.innerHTML = postsHTML;
        })
        .catch(error => {
            console.error('Error loading profile:', error);
            
            profileContainer.innerHTML = `
                <div class="error-message" style="padding: 20px; border: 1px solid #f44336; border-radius: 5px; margin: 20px 0;">
                    <h2 style="color: #f44336;">Error loading profile</h2>
                    <p><strong>Error:</strong> ${error.message}</p>
                    <p>This might be due to:</p>
                    <ul>
                        <li>Session expiration - try logging in again</li>
                        <li>Database connection issues</li>
                        <li>Missing user data in the database</li>
                    </ul>
                    <p>Try checking the browser console for more details.</p>
                    <div style="margin-top: 15px; display: flex; gap: 10px;">
                        <button onclick="location.reload()" style="padding: 10px 15px; background: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">Refresh Page</button>
                        <a href="/COSC360/public/login.php" style="padding: 10px 15px; background: #2196F3; color: white; text-decoration: none; border-radius: 4px;">Log In Again</a>
                    </div>
                </div>
            `;
        });
});
