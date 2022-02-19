<template>
  <div class="root-dialog-container">
    <div class="app-dialog-container">
      <dialog-component class="dialog_window" />
      <window-message-component class="send_message_window" />
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
.root-dialog-container {
  position: relative;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  /* top: 60px; */
  /* margin: 30px; */
  /* margin-right: 30px; */
}
.app-dialog-container {
  position: absolute;
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
}
.dialog_window {
  height: 90%;
}
.send_message_window {
  height: 10%;
}
</style>

