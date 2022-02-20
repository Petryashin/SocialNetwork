<template>
  <div class="window_message">
    <textarea v-model="textMessage" class="text_area"></textarea>
    <div @click="sendMessage" class="send">
      <div class="send_text">Отправить</div>
    </div>
  </div>
</template>

<script>
export default {
  name: "window-message",
  mounted() {},
  data() {
    return {
      textMessage: "",
    };
  },
  props : ['chat_id'],
  methods: {
    sendMessage() {
      if (!this.textMessage) return;
      let userId = this.$store.getters["user/getUserId"];
      this.$store.dispatch("messages/sendMessage", {
        text: this.textMessage,
        user_id: userId,
        chat_id : this.chat_id
      });
      this.textMessage = "";
    },
  },
};
</script>
<style scoped>
.window_message {
  width: 100%;
  /* border: 1px solid blue; */
  height: 10%;
  gap: 5px;
  display: flex;
  flex-direction: row;
  margin: 10px 0px;
  margin: auto;
}
.window_message .text_area {
  width: 100%;
  /* height: 100%; */
  /* margin : auto; */
  /* border: 1px solid blue; */
  border-radius: 3px;
  background-color: #39383dd9;
  color: white;
}
.window_message .send {
  text-align: center;
  width: 15%;
  /* height: 100%; */
  border: 1px solid gray;
  border-radius: 5px;
  vertical-align: middle;
  /* margin: auto; */
  background-color: #ff000029;
}
.send_text {
  top: 50%;
  transform: translateY(-50%);
  position: relative;
}
.window_message .send:hover {
  background-color: gray;
}
</style>


