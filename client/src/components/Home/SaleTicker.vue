<template>

  <div class="ticker-wrap">
    <div class="ticker">
      <div class="ticker__item"><a href="https://www.google.com"> Rabobank</a></div>
      <div class="ticker__item"><a style="color:white" href="https://www.google.com"> Bunnings Warehouse</a></div>
      <div class="ticker__item"><a style="color:white" href="https://www.google.com"> Westfarmers Insurance</a></div>
      <div class="ticker__item"><a style="color:white" href="https://www.google.com">Bhpbilliton</a></div>
      <div class="ticker__item"><a style="color:whit" href="https://www.google.com">John deere</a></div>
      <div class="ticker__item"><a style="color:whit" href="https://www.google.com">BEEF WEEK 2021</a></div>
      <div class="ticker__item"><a style="color:white" href="https://www.google.com">FARMFEST TOOWOOMBA, QLD Tuesday 2 - Thursday 4, June 2020</a></div>
      <div class="ticker__item"><a style="color:white" href="https://www.google.com">RURAL PRESS</a></div>
      <div class="ticker__item"><a style="color:white" href="https://www.google.com">AgQuip</a></div>
      <div class="ticker__item"><a style="color:white" href="https://www.google.com">Kubota For earth For life</a></div>
      <div class="ticker__item"><a style="color:white" href="https://www.google.com">CLIPEX Fencing Stockyards</a></div>
      <div class="ticker__item"><a style="color:white" href="https://www.google.com">Garden City Plastics Nursery pots</a></div>
      <div class="ticker__item"><a style="color:white" href="https://www.google.com">Nursery and Garden Industry australia</a></div>

    </div>
  </div>

</template>

<style scoped>


@-webkit-keyframes ticker {
  0% {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    visibility: visible;
  }
  100% {
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
  }
}
@keyframes ticker {
  0% {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    visibility: visible;
  }
  100% {
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
  }
}

.ticker-wrap:hover .ticker
{
  -webkit-animation-play-state: paused;
  -moz-animation-play-state: paused;
  -o-animation-play-state: paused;
  animation-play-state: paused;
}
.ticker-wrap {
  position: fixed;
  bottom: 8%;
  width: 100%;
  z-index: 9999;
  overflow: hidden;
  height: 2rem;
  background-color: #3498db;
  padding-left: 100%;
  box-sizing: content-box;
}
.ticker-wrap .ticker {
  display: inline-block;
  height: 1rem;
  line-height: 1.5rem;
  white-space: nowrap;
  padding-right: 100%;
  box-sizing: content-box;
  -webkit-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  -webkit-animation-timing-function: linear;
  animation-timing-function: linear;
  -webkit-animation-name: ticker;
  animation-name: ticker;
  -webkit-animation-duration: 30s;
  animation-duration: 30s;
  animation-direction: reverse;
}
.ticker-wrap .ticker__item {
  display: inline-block;
  padding: 0 2rem;
  font-size: 1.5rem;
  color: white;
}
h1, h2, p {
  padding: 0 5%;
}

</style>

<script>
export default {
}
</script>
