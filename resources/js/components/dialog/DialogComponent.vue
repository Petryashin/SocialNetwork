<!-- Use preprocessors via the lang attribute! e.g. <template lang="pug"> -->
<template>
  <div class="dialog">
    <div :key="message.id" v-for="message in messages">
      <MessageComponent :message="message" :userId="userId"></MessageComponent>
    </div>
  </div>
</template>

<script>
import MessageComponent from "./MessageComponent";
export default {
  data() {
    return {};
  },
  mounted() {
    console.log("mounted");
    window.Echo.channel("global_chat").listen(".message.add", (data) => {
      console.log(data);
      this.$store.commit("messages/setNewMessage", data.message);
    });
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
  components: {
    MessageComponent,
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
  margin: auto;
  width: 85%;
  height: 90%;
  scroll-behavior: auto;
  overflow-y: scroll;
  padding: 20px;
  /* background-image: url(https://fototips.ru/wp-content/uploads/2011/12/landscape_02.jpg); */
  background-image: url(./../../backgroundImages/NUrbIuIQtv8.jpg);
  /* background-image: url(./../../backgroundImages/C2usGOXv1tw.jpg); */
  background-size: 100%;
}
</style>