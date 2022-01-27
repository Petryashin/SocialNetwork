<!-- Use preprocessors via the lang attribute! e.g. <template lang="pug"> -->
<template>
  <div class="dialog">
    <div
      :key="message.id"
      v-for="message in messages"
      class="message"
      :class="message.user_id === 1 ? 'my-message' : ''"
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
    return {
     
    };
  },
  methods: {},
  computed : {
    messages () {
      return this.$store.getters['messages/getMessages']
    }

  }
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
  gap: 5px;
  border: 1px solid red;
  width: 100%;
  height: 500px;
  scroll-behavior: auto;
  overflow-y: scroll;
}
.message {
  text-align: justify;
  background-color: blue;
  min-width: 10%;
  max-width: 30%;
  padding: 3px;
  border-radius: 10px;
  margin: 5px;
  margin-right: auto;
}
.my-message {
  text-align: justify;
  background-color: gray;
  margin-right: 5px;
  margin-left: auto;
}
</style>