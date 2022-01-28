<template>
  <div class="root-container">
    <div class="app-container">
      <dialog-component />
      <message-component />
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    this.$store.dispatch("messages/getMessages");
    this.$store.dispatch("user/getUser");
  },
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
</style>
<style>
@import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;1,200&display=swap");
body {
  background-color: #08101e;
  font-family: Montserrat;
  font-size: 18px;
  color: white;
}
</style>
