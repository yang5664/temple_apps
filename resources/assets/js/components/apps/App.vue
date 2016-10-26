<template>
    <div>
        <p><span>Amount: </span>{{ amount }}</p>
        <p><span>Temp: </span>{{ temp }}</p>
        <button @click="calcPressNum(0)">0</button>
        <button @click="calcPressNum(1)">1</button>
        <button @click="calcPressNum(2)">2</button>
        <br>
        <button @click="calcPressNum(3)">3</button>
        <button @click="calcPressNum(4)">4</button>
        <button @click="calcPressNum(5)">5</button>
        <br>
        <button @click="calcPressNum(6)">6</button>
        <button @click="calcPressNum(7)">7</button>
        <button @click="calcPressNum(8)">8</button>
        <br>
        <button @click="calcPlus('+')"> + </button>
        <button @click="calcMinus('-')"> - </button>
        <button @click="calcEqual"> = </button>
        <br>
        <p><router-link :to="{ name: 'home' }">Home</router-link></p>
    </div>
</template>
<script>
    import { mapActions, mapGetters } from 'vuex'
    import store from '../../store/apps/index'

    export default {
        name: "Calc",
        store,
        computed: {
            ...mapGetters({
                amount: 'calcAmount',
                temp: 'calcTemp'
            })
        },
        methods: {
            ...mapActions([
                'calcPlus',
                'calcMinus',
                'calcPressNum',
                'calcEqual'
            ])
        },
        mounted() {
            console.log('mounted');
        },
        destroyed() {
            console.log('destroy');
        }
    }
</script>
