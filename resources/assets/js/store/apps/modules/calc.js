/**
 * Created by xuanyang on 11/10/2016.
 */
import * as types from '../mutation-types'

const state = {
    amount: 0,
    temp: ''
}

const mutations = {
    [types.OP_CALC_PLUS] (state, { op }) {
        state.temp = state.temp + op
    },

    [types.OP_CALC_MINUS] (state, { op }) {
        state.temp = state.temp + op
    },

    [types.OP_PRESS_NUM] (state, { num }) {
        state.temp = state.temp + num
    },

    [types.OP_CALC_EQUAL] (state) {
        state.amount = eval(state.temp)
        state.temp = ''
    }
}

export default {
    state,
    mutations
}