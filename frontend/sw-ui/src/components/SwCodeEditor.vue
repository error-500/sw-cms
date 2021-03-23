<template>
    <AceEditor v-model="content"
        :lang="codeLang"
        :theme="theme"
        width="100%"
        height="400px"
        :options="options"
        :commands="commands"
        @init="onInit"
        @change="setValue"></AceEditor>
</template>
<script>
import AceEditor from 'vuejs-ace-editor';
export default {
    props: {
        mode: {
            type: [String, Array],
            default() {
                return [
                    'html',
                    'javascript',
                    'css',
                ];
            }
        },
        snippets: {
            type: [String, Array],
            default() {
                return 'javascript';
            }
        },
        theme: {
            type: String,
            default: 'monokai',
        },
        selector: {
            type: String,
            default: 'textarea',
        },
        options: {
            type: Object,
            default() {
                return {
                    enableBasicAutocompletion: true,
                    enableLiveAutocompletion: true,
                    fontSize: 14,
                    highlightActiveLine: true,
                    enableSnippets: true,
                    showLineNumbers: true,
                    tabSize: 2,
                    showPrintMargin: false,
                    showGutter: true,
                }
            }
        },
        commands: {
            type: Array,
            default() {
                return [];
            }
        },
    },
    data() {
        return {
            content: null,
            target: null,
        };
    },
    computed: {
        codeLang() {
            return this.mode instanceof Array ? this.mode[0] : this.mode;
        }
    },
    methods: {
        onInit() {
            require('brace/ext/language_tools');
            if(this.mode instanceof Array) {
                this.mode.forEach((val) => {
                    require(`brace/mode/${val}`);
                });
            } else {
                require(`brace/mode/${this.mode}`);
            }
            if(this.shippets instanceof Array) {
                this.snippets.forEach((val) => {
                    require(`brace/snippets/${val}`);
                });
            } else {
                require(`brace/snippets/${this.snippets}`);
            }
            require(`brace/theme/${this.theme}`);
        },
        getValue() {

            if (this.target) {
                this.content = this.target.value;
            }
        },
        setValue() {
            this.target.value = this.content
        }
    },
    created() {
        this.$nextTick(() => {
            this.target = document.querySelector(this.selector);
            this.getValue();
        })
    },
    components: {
        AceEditor,
    }
}
</script>
