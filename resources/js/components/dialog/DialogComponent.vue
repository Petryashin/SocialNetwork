<!-- Use preprocessors via the lang attribute! e.g. <template lang="pug"> -->
<template>
  <div class="dialog">
    <div
      :key="message.id"
      v-for="message in messages"
      class="message"
      :class="message.user_id === userId ? 'my-message' : ''"
    >
      <div class="message-content">
        {{ message.text }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  mounted() {
    window.Echo.channel('chat').listen('MessageCreatedBroadcasting',(data) =>{
        console.log(data)
    })
  },
  methods: {},
  computed: {
    userId() {
      return this.$store.getters["user/getUserId"];
    },
    messages() {
      return this.$store.getters["messages/getMessages"];
    },
  },
};
</script>

<!-- Use preprocessors via the lang attribute! e.g. <style lang="scss"> -->
<style>
#app {
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  top: 60px;
  margin: 5px;
}
.dialog {
  display: flex;
  flex-direction: column;
  gap: 7px;
  border: 1px solid red;
  width: 100%;
  height: 700px;
  scroll-behavior: auto;
  overflow-y: scroll;
  padding: 20px;
}
.message {
  text-align: justify;
  background-color: rgb(30 71 141 / 81%);
  min-width: 10%;
  max-width: 30%;
  padding: 5px 10px;
  border-radius: 10px;
  margin: 5px;
  margin-right: auto;
}
.my-message {
  text-align: justify;
  background-color: #5b4e4e;
  margin-right: 5px;
  margin-left: auto;
}
</style>