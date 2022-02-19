<!-- Use preprocessors via the lang attribute! e.g. <template lang="pug"> -->
<template>
  <div class="dialog">
    <div>
      <div :key="message.id" v-for="message in messages">
        <MessageComponent
          :message="message"
          :userId="userId"
        ></MessageComponent>
      </div>
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
<style scoped>
.dialog {
  display: flex;
  flex-direction: column;
  /* gap: 7px; */
  border: 1px solid red;
  /* margin: auto; */
  /* width: 85%; */
  height: 100%;
  scroll-behavior: auto;
  overflow-y: scroll;
  padding: 15px;
  background-image: url(/images/NUrbIuIQtv8.jpg?7a6b37c749fa19cdc6e898919ce60ad2);
  background-size: 100%;
}
</style>