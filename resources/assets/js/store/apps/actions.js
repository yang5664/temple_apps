/**
 * Created by xuanyang on 11/10/2016.
 */
import * as types from './mutation-types'

export const calcPlus = ({ commit }, op) => {
    commit(types.OP_CALC_PLUS, { op })
}

export const calcMinus = ({ commit }, op) => {
    commit(types.OP_CALC_MINUS, { op })
}

export const calcPressNum = ({ commit }, num) => {
    commit(types.OP_PRESS_NUM, { num })
}

export const calcEqual = ({ commit }) => {
    commit(types.OP_CALC_EQUAL)
}