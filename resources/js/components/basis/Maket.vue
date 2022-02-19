<template>
  <div id="root_maket_container">
    <div class="page_header">
      <span class="page_header_inner">DK</span>
    </div>
    <div class="content_splitter">
      <div class="content_list_pages_ref">
        <MainMenuList />
      </div>
      <div class="content_this_page">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>
<script>
import MainMenuList from "./MainMenuList.vue";
export default {
  components: {
    MainMenuList,
  },
};
</script>
<style scoped>
#root_maket_container {
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  border: 1px solid black;
}

.page_header {
  border: 1px solid rgb(135, 135, 138 , 0.3);
  height: 6%;
  display: flex;
}
.page_header_inner {
  margin: auto;
  margin-left: 10px;
  font-size: 26px;
  font-weight: bold;
}
.content_splitter {
  display: flex;
  flex-direction: raw;
  border: 1px solid rgb(135, 135, 138 , 0.3);
  height: 85%;
}
.content_list_pages_ref {
  width: 12%;
  border: 1px solid rgb(135, 135, 138 , 0.3);
}
.content_this_page {
  border: 3px solid rgb(135, 135, 138 , 0.3);
  flex-basis: 88%;
}
</style>
