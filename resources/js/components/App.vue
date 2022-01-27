<template>
  <div class="root-container">
    <dialog-component />
    <message-component />
  </div>
</template>

<script>
export default {
  mounted() {
    setInterval(()=> this.$store.dispatch('messages/getMessages')
    ,1000)
    this.$store.dispatch('messages/getMessages')
    this.$store.dispatch('user/getUser')
    
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
  top: 60px;
  margin: 5px;
}
</style>
<style>
body{
  background-color: rgb(5, 6, 8);
}
</style>
