<?php

namespace sw\widgets;

use Yii;
use yii\bootstrap4\Widget;

class VueAlerts extends Widget
{
    public $titleTemplate = 'Событие %s';
    public function run()
    {
        Yii::$app->vueApp->methods = [
            'flash' => 'function(message, variant, title){
                this.$bvToast.toast(
                    message,
                    {
                        title: title,
                        toaster: "b-toaster-top-right",
                        solid: true,
                        variant: variant,
                        appendToast: true,
                    }
            }'
        ];
        Yii::$app->vueApp->data = [
            'flashMsg' => Yii::$app->session->getAllFlashes(true),
        ];
        Yii::$app->vueApp->mounted = [
            'this.$nextTick(() => {
                const variants = Object.keys(this.flashMsg);
                variants.forEach((variant) => {
                    if (this.flashMsg[variant] instanceof Array) {
                        this.flashMsg[variant].slice().forEach((msg) => {
                            this.flash(msg, variant, `Событие ${variant}`);
                        });
                    } else {
                        this.flash(this.flashMsg[variant], variant, `Событие ${variant}`);
                    }
                })
            );'
        ];
    }
}