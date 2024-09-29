<script setup>
const imageurl = '/asd.png'; // Use the path directly
</script>

<template>
<div class="grid formgrid col-12">
    <div class="col-7">
        <img :src="imageurl" alt="Description of image" style="width: 100%; height: auto;"/>
    </div>
     <Divider layout="vertical" />
    <div class="col-4">
        asdfg
    </div>
</div>
</template>
