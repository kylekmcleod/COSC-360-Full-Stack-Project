<?php
include_once('../src/controllers/auth.php');
redirectIfNotLoggedIn();
?>


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Page</title>
    <link rel="stylesheet" href="../assets/css/globals.css" />
    <link rel="stylesheet" href="../assets/css/homepage/brand.css" />
    <link rel="stylesheet" href="../assets/css/homepage/layout.css" />
    <link rel="stylesheet" href="../assets/css/nav/sidebar-menu.css" />
    <link rel="stylesheet" href="../assets/css/homepage/trends-for-you.css" />
    <link rel="stylesheet" href="../assets/css/homepage/post.css" />
    <link rel="stylesheet" href="../assets/css/homepage/postSomething.css" />
    <link rel="stylesheet" href="../assets/css/homepage/who-to-follow.css" />
    <link rel="stylesheet" href="../assets/css/homepage/header.css" />
    <link rel="stylesheet" href="../assets/css/homepage/sports-scores.css" />
    <link rel="stylesheet" href="../assets/css/settings/setting.css" />
  </head>
  <body>
    <!-- Header -->
    <header class="header">
        <div class="header__content">
            <div class="header__search-container">
                <input 
                    type="text" 
                    class="header__search-input" 
                    placeholder="Search..."
                />
                <img 
                    src="../assets/svg/search.svg" 
                    class="header__search-icon" 
                    alt="Search"
                />
            </div>
        </div>
    </header>

    <div class="layout">
      <?php
        include_once('../assets/components/leftSideBar.php');
      ?>
        
      <!-- Main content -->
      <div class="layout__main">
        <h1 class="settings-panel__header">Settings</h1>
        
        <div class="settings__banner">
            <img src="../assets/images/kobeBannerHorizontal.jpg" alt="Banner Image" class="settings__banner-image" />
            <img src="../assets/images/profile-image-4.jpg" alt="Profile Image" class="settings__profile-image" />
            <img src="../assets/svg/editImage.svg" alt="Edit Banner" class="settings__edit-banner" />
        </div>

        <div class="settings-panel">
            <div class="settings-panel__block">
                <div class="settings-panel__content">
                    <div class="settings-panel__label">Name</div>
                    <div class="settings-panel__meta">Kevin Durant</div>
                </div>
                <div class="settings-panel__edit">Edit</div>
            </div>

            <div class="settings-panel__block">
                <div class="settings-panel__content">
                    <div class="settings-panel__label">Username</div>
                    <div class="settings-panel__meta">@easyMoneySniper</div>
                </div>
                <div class="settings-panel__edit">Edit</div>
            </div>

            <div class="settings-panel__block">
                <div class="settings-panel__content">
                    <div class="settings-panel__label">Email</div>
                    <div class="settings-panel__meta">KD35@nba.player.com</div>
                </div>
                <div class="settings-panel__edit">Edit</div>
            </div>

            <div class="settings-panel__block">
                <div class="settings-panel__content">
                    <div class="settings-panel__label">About me</div>
                    <div class="settings-panel__meta">#35 Phoenix Suns, Soon to be #7 for Minnesota Timberwolves</div>
                </div>
                <div class="settings-panel__edit">Edit</div>
            </div>
        </div>
      </div>


      <!-- Right sidebar -->
      <div class="layout__right-sidebar-container">
        <div class="layout__right-sidebar">
          <div class="who-to-follow">
            <div class="who-to-follow__block">
              <div class="who-to-follow__heading">
                Who to follow
              </div>
            </div>
            
            <div class="who-to-follow__block">
              <img
                class="who-to-follow__author-logo"
                src="../assets/images/profile-image-1.jpg"
              />
              <div class="who-to-follow__content">
                <div>
                  <div class="who-to-follow__author-name">
                    Sports Dude 23
                  </div>
                  <div class="who-to-follow__author-slug">
                    @messilover23
                  </div>
                </div>
                <div class="who-to-follow__button">
                  +
                </div>
              </div>
            </div>
            <div class="who-to-follow__block">
              <img
                class="who-to-follow__author-logo"
                src="../assets/images/profile-image-2.jpg"
              />
              <div class="who-to-follow__content">
                <div>
                  <div class="who-to-follow__author-name">
                    Connor McDavid
                  </div>
                  <div class="who-to-follow__author-slug">
                    @connormcdavid
                  </div>
                </div>
                <div class="who-to-follow__button">
                  +
                </div>
              </div>
            </div>

            <div class="who-to-follow__block">
              <img
                class="who-to-follow__author-logo"
                src="../assets/images/profile-image-3.jpg"
              />
              <div class="who-to-follow__content">
                <div>
                  <div class="who-to-follow__author-name">
                    LaMelo Ball
                  </div>
                  <div class="who-to-follow__author-slug">
                    @melo
                  </div>
                </div>
                <div class="who-to-follow__button">
                  +
                </div>
              </div>
            </div>
          </div>
          
          <div class="trends-for-you">
            <div class="trends-for-you__block">
              <div class="trends-for-you__heading">
                Trending
              </div>
            </div>
            <div class="trends-for-you__block">
              <div class="trends-for-you__meta-information">
                NBA Trending
              </div>
              <div class="trends-for-you__trend-name">
                #LeBron
              </div>
              <div class="trends-for-you__meta-information">
                23k posts
              </div>
            </div>
            <div class="trends-for-you__block">
              <div class="trends-for-you__meta-information">
                NHL Trending
              </div>
              <div class="trends-for-you__trend-name">
                #CanadaVsUSA
              </div>
              <div class="trends-for-you__meta-information">
                43k posts
              </div>
            </div>
            <div class="trends-for-you__block">
              <div class="trends-for-you__meta-information">
                NFL Trending
              </div>
              <div class="trends-for-you__trend-name">
                #eagles
              </div>
              <div class="trends-for-you__meta-information">
                12k posts
              </div>
            </div>
          </div>
          <div class="sports-scores">
            <div class="sports-scores__block">
              <div class="sports-scores__heading">
                Live Scores
              </div>
            </div>
            
            <div class="sports-scores__block">
              <div class="sports-scores__league">NBA</div>
              <div class="sports-scores__game">
                <div class="sports-scores__team">
                  <span class="sports-scores__team-name">LAL</span>
                  <span class="sports-scores__team-score">112</span>
                </div>
                <div class="sports-scores__team">
                  <span class="sports-scores__team-name">GSW</span>
                  <span class="sports-scores__team-score">104</span>
                </div>
              </div>
            </div>

            <div class="sports-scores__block">
              <div class="sports-scores__league">NHL</div>
              <div class="sports-scores__game">
                <div class="sports-scores__team">
                  <span class="sports-scores__team-name">TOR</span>
                  <span class="sports-scores__team-score">3</span>
                </div>
                <div class="sports-scores__team">
                  <span class="sports-scores__team-name">MTL</span>
                  <span class="sports-scores__team-score">2</span>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile nav without logo -->
    <?php
      include_once('../assets/components/mobileNav.php');
    ?>
    <script src="../assets/js/postSomething.js"></script>
    <script src="../assets/js/editprofile.js"></script>
  </body>
</html>