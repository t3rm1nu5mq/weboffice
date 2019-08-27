<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4 main-menu">
                Projektek
            </div>
            <div class="col-md-4 main-menu">
                Pénzügyek
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Dashboard"
    }
</script>

<style scoped>
    body {
        background-color: #f4f3ec;
    }
    .main-menu {
        cursor: pointer;
        border: 1px solid;
        border-radius: 15px;
        width: 50%;
        height: 100px;
        text-align: center;
        margin: 20px;
        font-size: large;
    }

    .main-menu:hover {
        background-color: red;
    }
</style>
