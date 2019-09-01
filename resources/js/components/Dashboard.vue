<template>
    <div class="container">
            <div class="row" style="margin: auto; width: 50%">
                <div class="main-menu">
                    <img src="/icons/partner.png" class="main-menu-icon"><br>
                    Partnerek
                </div>
                <div class="main-menu">
                    <img src="/icons/project.png" class="main-menu-icon"><br>
                    Projektek
                </div>
                <div class="main-menu">
                    <img src="/icons/finance.png" class="main-menu-icon"><br>
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
        width: 150px;
        height: 150px;
        text-align: center;
        margin: 10px;
        font-size: large;
        padding: 20px;
        background-color: #2d142c;
        color: white;
    }

    .main-menu:hover {
        background-color: #510a32;
        color: white;
        font-weight: bold;
    }

    .main-menu-icon {
        height: 70px;
        width: auto;
    }
</style>
