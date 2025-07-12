<script>
import { ref, onMounted } from "vue";

export default {
    name: "App",
    props: {
        users: {
            type: Array,
            default: () => [],
        },
    },
    setup(props) {
        console.log("Vue setup çalıştı");
        console.log("Props:", props);
        console.log("Users:", props.users);

        onMounted(() => {
            console.log("Component mounted");
            console.log("Users in mounted:", props.users);
        });

        return {
            users: props.users,
        };
    },
};
</script>

<template>
    <div>
        <h1>Kullanıcı Listesi</h1>

        <!-- Debug: Vue'da users prop'u -->
        <div style="background: #e0e0e0; padding: 10px; margin: 10px">
            <h3>DEBUG - Vue'da users prop'u:</h3>
            <pre>{{ JSON.stringify(users, null, 2) }}</pre>
            <p>
                Users array uzunluğu: {{ users ? users.length : "undefined" }}
            </p>
        </div>

        <ul>
            <li v-for="user in users" :key="user.id">
                {{ user.name }} ({{ user.email }})
            </li>
        </ul>
    </div>
</template>
