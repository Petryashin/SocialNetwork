<template>
  <div class="window_message">
    <textarea v-model="textMessage" class="text_area"></textarea>
    <div @click="sendMessage" class="send">Отправить</div>
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
  methods: {
    sendMessage() {
      if (!this.textMessage) return
      let userId = this.$store.getters["user/getUserId"];
      this.$store.dispatch("messages/sendMessage", {
        text: this.textMessage,
        user_id: userId,
      });
      this.textMessage = ""
    },
  },
};
</script>
<style scoped>
.window_message {
  width: 85%;
  /* border: 1px solid blue; */
  height: 5%;
  gap: 5px;
  display: flex;
  flex-direction: row;
  margin: 10px 0px;
  margin:auto;
}
.window_message .text_area {
  width: 100%;
  /* height: 100%; */
  margin : auto;
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
  margin: auto;
  background-color: #ff0000e3;
}
.window_message .send:hover {
  background-color: gray;
}
</style>


