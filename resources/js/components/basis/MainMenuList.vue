<template>
  <div class="root_main_menu">
    <router-link class="reference" to="/me">Моя страница</router-link>
    <router-link class="reference" to="/dialog">Диалоги</router-link>
  </div>
</template>
<script>
export default {};
</script>
<style scoped>
.root_main_menu {
  display: flex;
  flex-direction: column;
  gap: 20px;
  padding: 7%;
}
.reference {
  text-decoration: none;
  color: white;
  margin: 5% 10%;
  text-shadow: 9px 5px 4px #ffffff;
}
.reference:hover {
  opacity: 0.3;
}
</style>
