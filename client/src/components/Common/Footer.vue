<template>
  <footer id="footer-section">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="footer-logo-sec">
            <a href="<?php echo base_url('/');?>">
              <b-img
                fluid
                :src="require('../../assets/logo.png')"
              />
            </a>
          </div>

          <div class="socil-icon ml-3 my-5">
            <ul>
              <a
                target="blank"
                href=""
              >
                <li class="facebook">
                  <font-awesome-icon :icon="['fab', 'facebook-f']" />
                </li>
              </a>

              <a
                target="blank"
                href=""
              >
                <li class="ml-5">
                  <font-awesome-icon :icon="['fab', 'twitter']" />
                </li>
              </a>
            </ul>
          </div>
        </div>

        <div class="col-md-3">
          <div class="footer-logo-sec">
            <h2>OUR LINKS</h2>
            <ul>
              <li>
                About Us
              </li>
              <li>
                Login
              </li>
              <li>
                Register
              </li>
            </ul>
            <ul class="new-menu">
              <li>
                Terms of Service
              </li>
              <li>
                Privacy Policy
              </li>
              <li>
                Help
              </li>
            </ul>
          </div>
        </div>

        <div class="col-md-3">
          <div class="footer-logo-sec-right">
            <h2>Contact Us</h2>
            <p>
              <font-awesome-icon
                :icon="['fa', 'phone']"
                color="#00aced"
              />
              0451231932
            </p>
            <p>
              <font-awesome-icon
                :icon="['fa', 'envelope']"
                color="#00aced"
              />
              HawkiSupply@gmail.com
            </p>
            <p>
              <font-awesome-icon
                :icon="['fa', 'address-book']"
                color="#00aced"
              />
              Brisbane
            </p>
          </div>
          <div class="button-section-phone button-part" />
        </div>

        <div class="col-md-3">
          <div class="iphone-img">
            <b-img
              class=""
              :src="require('../../assets/iphone-button.png')"
            />
          </div>
          <div class="iphone-img">
            <b-img :src="require('../../assets/android-button.png')" />
          </div>
        </div>
      </div>
    </div>

    <div class="footer-content text-center">
      <p>Copyright © 2019 HawkiSupply. All rights reserved.</p>
    </div>
  </footer>
</template>

<style scoped>
footer#footer-section {
  padding-top: 30px;
  padding-bottom: 0px;
}

.footer-logo-sec p {
  font-size: 14px !important;
  color: #868686;
  line-height: 24px;
  margin-top: 15px;
}

.footer-logo-sec h2 {
  font-size: 18px;
  color: #231f20;
  margin-bottom: 25px;
  margin-top: 0;
  font-weight: 600;
}

.footer-logo-sec ul {
  padding: 0;
  list-style: none;
  width: 49%;
  display: inline-block;
}

.footer-logo-sec ul li {
  font-size: 14px;
  color: #231f20;
  margin-bottom: 10px;
}
.footer-logo-sec ul li font-awesome-icon{
  color:#00aced
}

.socil-icon ul {
  list-style: none;
  padding: 0;
}
.socil-icon ul li{
  display: inline-block;
  font-size: 2em;
  color:#00aced
}

.button-part {
  margin-bottom: 40px;
}

.button-section-phone {
  margin-top: 40px;
}

.iphone-img {
  display: inline-block;
  padding-right: 12px;
}

.footer-content.text-center {
  background: #231f20;
  padding: 12px;
}

.footer-content p {
  color: #fff;
  font-size: 14px;
  margin: 0;
}

.footer-logo-sec-right p {
    font-size: 14px !important;
    color: #231f20;
    line-height: 24px;
    margin-top: 15px;
}

.footer-logo-sec-right h2 {
    font-size: 18px;
    color: #231f20;
    margin-bottom: 25px;
    margin-top: 0;
    font-weight: 600;
}
</style>