
<template>

  <div class="q-pa-md main-container column" style="height: 750px">
        
    <div class="navbar col-2">
        <navbar />
    </div>

    <div class="router-view col-10">
      <router-view></router-view>  
    </div>
  
  </div>

</template>

<script>
import Navbar from "./components/Navbar.vue";

export default {

  components: {Navbar},

  setup() {

    return {

    }
  }

}

</script>

<style scoped>
#app {
  padding: 0px;
  margin: 0px;
}

.main-container {
  width:800px;
}

</style>
