<template>
    <div class="page">
        <p>{{ counter }}</p>
        <button @click="counter += 1">
            click!
        </button>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import axios from 'axios'
</script>