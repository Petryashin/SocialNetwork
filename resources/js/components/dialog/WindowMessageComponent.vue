<template>
  <div class="window_message">
    <textarea v-model="textMessage" class="text_area"></textarea>
    <div
    @click="sendMessage"
    class="send">Send</div>
  </div>
</template>

<script>
export default {
  name : "window-message",
  mounted() {},
  data() {
    return {
      textMessage : "",
    }
  },
  methods : {
    sendMessage(){
      let userId = this.$store.getters['user/getUserId']
      this.$store.dispatch('messages/sendMessage',{text : this.textMessage, user_id: userId})
    }
  },
};
</script>
<style scoped>
.window_message {
  width: 800px;
  border: 1px solid blue;
  height: 40px;
  gap: 5px;
  display: flex;
  flex-direction: row;
}
.window_message .text_area {
  width: 100%;
  height: 85%;
  border: 1px solid blue;
}
.window_message .send {
  text-align: center;
}
.window_message .send:hover {
  background-color: gray;
}
</style>


