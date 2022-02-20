<template>
  <div  id="root_chats_component">
    <div class="chats_content_splitter">
      <div @click="chat_id=null" class="content_list_pages_chats">
        <div  v-for="chat in chats" :key="chat.id" @click.stop="chooseDialog(chat)" class="content_chat_blick">
          {{ chat.name }}
        </div>
      </div>
      <div class="content_this_chat">
          <DialogMainComponent v-show="chat_id" :chat_id="chat_id" />
      </div>
    </div>
  </div>
</template>
<script>
import DialogMainComponent from "./../../dialog/DialogMainComponent"
export default {
  mounted() {
    this.$store.dispatch("chats/getChatsFrom");
  },
  data() {
    return {
        chat_id : null,
    };
  },
  computed: {
    chats() {
      return  this.$store.getters["chats/getChats"]
    },
  },
  methods: {
      chooseDialog(chat){
          this.chat_id =  chat.id
      }
  },
  components : {
      DialogMainComponent
  }
};
</script>
<style scoped>
#root_chats_component {
  position: relative;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  border: 1px solid black;
  font-size: 14px;
}

.chats_content_splitter {
  display: flex;
  flex-direction: row;
  border: 1px solid red;
  height: 100%;
}
.content_list_pages_chats {
  width: 23%;
  /* border: 1px solid red; */
  display: flex;
  flex-direction: column;
  gap: 5px;
  padding: 5px;
  margin: 0px 5px;
  cursor: pointer;
}
.content_chat_blick{
    border-radius: 5px;
}
.content_chat_blick:hover{
    opacity : 0.8;
}
.content_this_chat {
  border: 3px solid yellow;
  flex-basis: 77%;
}
</style>
