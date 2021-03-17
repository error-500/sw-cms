<template>
    <form :action="actionUrl"
        class="form-box text-center"
        method="post">
        <input type="hidden"
                :name="csrfParam"
                :value="csrf" />
        <div class="col-md-6">
            <p>{{ checkinLabel }}</p>
            <input name="checkin"
                    id="checkin"
                    type="date"
                    data-toggle="datepicker"
                    :class="{'form-control':true, 'form-value':true, 'form-error':$v.checkin.$error}"
                    placeholder=""
                    v-model.trim="$v.checkin.$model"
                    required />
        </div>
        <div class="col-md-6">
            <p>{{ timeLabel }}</p>
            <input id="time"
                    name="time"
                    placeholder=""
                    type="time"
                    v-model.trim="$v.time.$model"
                    :class="{'form-control':true, 'form-value':true, 'form-error':$v.time.$error}"
                    required />
        </div>
        <hr class="space s" />
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <p>{{nameLabel}}</p>
                <input id="name"
                        name="name"
                        placeholder=""
                        type="text"
                        v-model.trim="$v.name.$model"
                        :class="{'form-control':true, 'form-value':true, 'form-error':$v.name.$error}"
                        required />
            </div>
            <div class="col-md-6 col-xs-12">
                <p>{{ guestsLabel }}</p>
                <input id="guests"
                        name="guests"
                        placeholder=""
                        type="number"
                        min="1"
                        max="130"
                        step="1"
                        v-model.number="$v.guests.$model"
                        :class="{'form-control':true, 'form-value':true, 'form-error':$v.guests.$error}"
                        required />
            </div>
        </div>
        <hr class="space xs" />
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <p>{{emailLabel}}</p>
                <input id="email"
                        name="email"
                        placeholder=""
                        type="email"
                        v-model.trim="$v.email.$model"
                        :class="{'form-control':true, 'form-value':true, 'form-error':$v.email.$error}"
                        required />
            </div>
            <div class="col-md-6 col-xs-12">
                <p>{{phoneLabel}}</p>
                <input id="phone"
                        name="phone"
                        placeholder="+79996543210"
                        type="text"
                        v-model.trim="$v.phone.$model"
                        :class="{'form-control':true, 'form-value':true, 'form-error':$v.phone.$error}"
                        />
            </div>
        </div>
        <hr class="space xs" />
        <div class="row">
            <div class="col-md-12">
                <p>{{messageLabel}}</p>
                <textarea id="message"
                            name="message"
                            :class="{'form-control':true, 'form-value':true, 'form-error':$v.message.$error}"
                            placeholder=""
                            v-model.trim="$v.message.$model"
                            required></textarea>
                <hr class="space s" />
                <button class="anima-button circle-button btn-sm btn"
                        type="submit">
                    <i class="im-envelope"></i>{{ okLabel}}
                </button>
            </div>
        </div>
        <div class="error-box" if="errors.length">
            <div class="alert alert-danger"
                v-for="(error, idx) in errors"
                :key="`form-error-${idx}`">
                <b>{{error.attrName}}:</b>{{error.attrError}}
            </div>
        </div>
    </form>
</template>
<script>
import { validationMixin } from 'vuelidate';
import { required, minLength, email, numeric } from 'vuelidate/lib/validators';
export default {
    name: 'sw-reserv-form',
    mixins: [validationMixin],
    props: {
        actionUrl : {
            type: String,
            default: '',
        },
        csrfParam: {
            type: String,
            default: '_csrf',
        },
        csrfToken: {
            type: String,
            default: null,
        },
        checkinLabel: {
            type: String,
            default: 'Дата',
        },
        checkinValue: {
            type: String,
            default: null
        },
        timeLabel: {
            type: String,
            default: 'Время',
        },
        timeValue: {
            type: String,
            default: null,
        },
        nameLabel: {
            type: String,
            default: 'ФИО',
        },
        nameValue: {
            type: String,
            default: null,
        },
        guestsLabel: {
            type: String,
            default: 'Кол-во гостей'
        },
        guestsValue: {
            type: Number,
            default: 1
        },
        emailLabel: {
            type: String,
            default: 'Email',
        },
        emailValue: {
            type: String,
            default: null,
        },
        phoneLabel: {
            type: String,
            default: 'Телефон',
        },
        phoneValue: {
            type: String,
            default: null,
        },
        messageLabel: {
            type: String,
            default: 'Сообщение',
        },
        messageValue: {
            type: String,
            default: null,
        },
        okLabel: {
            type: String,
            default: 'Заказать',
        },
        errors: {
            type: Array,
            default() {
                return [];
            }
        },

    },
    data(){
        return{
            csrf: this.csrfToken,
            checkin: this.checkinValue,
            time: this.timeValue,
            name: this.nameValue,
            guests: this.guestsValue,
            email: this.emailValue,
            phone: this.phoneValue,
            message: this.messageValue,
        };
    },
    validations: {
        checkin: {
            required,
        },
        time: {
            required,
        },
        name: {
            required,
        },
        guests: {
            required,
        },
        email: {
            email,
        },
        phone: {
            required,
            numeric,
            minLength: minLength(11)
        },
        message: {
            required,
        },
    },
    created() {
        if(!this.csrfToken) {
            if (!this.$root.csrfToken) {
                const csrfMeta = document.querySelector('[name="csrf-token"]').getAttribute('content');
                this.csrf = csrfMeta;
            } else {
                this.csrf = this.$root.csrfToken;
            }

        }
    }
}
</script>
