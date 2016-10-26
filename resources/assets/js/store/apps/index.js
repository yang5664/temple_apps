/**
 * Created by xuanyang on 11/10/2016.
 */

import Vuex from 'vuex'
import * as actions from './actions'
import * as getters from './getters'
import calc from './modules/calc'

Vue.config.debug = true;

const debug = process.env.NODE_ENV !== 'production';

export default new Vuex.Store({
  actions,
  getters,
  modules: {
    calc
  },
  strict: debug
})
