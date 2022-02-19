<template>
  
  <div class="root-container">
    <div class="global_background_image"></div>
    <div class="app-container">
      <maket-component></maket-component>
    </div>
  </div>
</template>

<script>
import DialogMainComponent from "./dialog/DialogMainComponent.vue"
export default {
  mounted() {
    this.$store.dispatch("messages/getMessages");
    this.$store.dispatch("user/getUser");
  },
  components : {
    DialogMainComponent
  }
};
</script>
<style scoped>
.root-container {
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  /* top: 60px; */
  /* margin: 30px; */
  margin-right: 30px;
  
}
.app-container {
  position: absolute;
  width: 100%;
  height: 100%;
  padding: 1%;
}
.global_background_image {
  background: url(/images/NUrbIuIQtv8.jpg) no-repeat;
  background-size: cover;
  filter: blur(3px);
  width: 100%;
  height: 100%;
  position: absolute;
}
</style>
<style>
@import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;1,200&display=swap");
body {
  background-color: #08101e;
  font-family: Montserrat;
  font-size: 18px;
  color: white;
}
#app {
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  top: 60px;
  margin: 5px;
}
#global_background_image {
  background: url(/images/body.jpg?876b20dc57564f589cdbe8f3407e9e56) no-repeat;
  background-size: cover;
  filter: blur(2px);
  width: 100%;
  height: 100%;
  position: absolute;
}
.card {
  background-color: #00053d;
  opacity: 0.9;
}
</style>
