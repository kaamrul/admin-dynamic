import './bootstrap';
import './template'
import './helper'

import {createApp} from "vue";

import Pos from "./components/pos/Pos.vue";
import UpdatePasswordComponent from "./components/common/UpdatePasswordComponent.vue";

var app = createApp();

app.component('Pos', Pos);
app.component('common-update-password', UpdatePasswordComponent);
app.mount("#app");
