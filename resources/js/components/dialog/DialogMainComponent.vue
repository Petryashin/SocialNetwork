<template>
  <div class="root-dialog-container">
    <div class="app-dialog-container">
      <dialog-component :chat_id="chat_id" class="dialog_window" />
      <window-message-component :chat_id="chat_id" class="send_message_window" />
    </div>
  </div>
</template>
<script>
export default {
  props : ['chat_id'],
  mounted() {
    this.$store.dispatch("messages/getMessages", this.chat_id);
    window.Echo.channel("global_chat").listen(".message.add", (data) => {
      console.log(data);
      this.$api.get(`/api/dialog/user/${data.message.user_id}`).then(
        (res)=>{
          let message = data.message
          message.user = res.data
          this.$store.commit("messages/setNewMessage", message);
        }
      )
      
    });
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

