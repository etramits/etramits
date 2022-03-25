"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[421],{3744:(e,t)=>{t.Z=(e,t)=>{const o=e.__vccOpts||e;for(const[e,n]of t)o[e]=n;return o}},8789:(e,t,o)=>{o.d(t,{Z:()=>l});var n=o(821),r={class:"text-sm text-gray-600"};const s=(0,n.defineComponent)({props:["on"]});const l=(0,o(3744).Z)(s,[["render",function(e,t,o,s,l,i){return(0,n.openBlock)(),(0,n.createElementBlock)("div",null,[(0,n.createVNode)(n.Transition,{"leave-active-class":"transition ease-in duration-1000","leave-from-class":"opacity-100","leave-to-class":"opacity-0"},{default:(0,n.withCtx)((function(){return[(0,n.withDirectives)((0,n.createElementVNode)("div",r,[(0,n.renderSlot)(e.$slots,"default")],512),[[n.vShow,e.on]])]})),_:3})])}]])},8050:(e,t,o)=>{o.d(t,{Z:()=>c});var n=o(821),r={class:"md:grid md:grid-cols-3 md:gap-6"},s={class:"mt-5 md:mt-0 md:col-span-2"},l={class:"px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg"};var i=o(5218);const a=(0,n.defineComponent)({components:{JetSectionTitle:i.Z}});const c=(0,o(3744).Z)(a,[["render",function(e,t,o,i,a,c){var d=(0,n.resolveComponent)("jet-section-title");return(0,n.openBlock)(),(0,n.createElementBlock)("div",r,[(0,n.createVNode)(d,null,{title:(0,n.withCtx)((function(){return[(0,n.renderSlot)(e.$slots,"title")]})),description:(0,n.withCtx)((function(){return[(0,n.renderSlot)(e.$slots,"description")]})),_:3}),(0,n.createElementVNode)("div",s,[(0,n.createElementVNode)("div",l,[(0,n.renderSlot)(e.$slots,"content")])])])}]])},7020:(e,t,o)=>{o.d(t,{Z:()=>l});var n=o(821),r=["type"];const s=(0,n.defineComponent)({props:{type:{type:String,default:"submit"}}});const l=(0,o(3744).Z)(s,[["render",function(e,t,o,s,l,i){return(0,n.openBlock)(),(0,n.createElementBlock)("button",{type:e.type,class:"inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"},[(0,n.renderSlot)(e.$slots,"default")],8,r)}]])},6552:(e,t,o)=>{o.d(t,{Z:()=>l});var n=o(821),r=["value"];const s=(0,n.defineComponent)({emits:["update:checked"],props:{checked:{type:[Array,Boolean],default:!1},value:{default:null}},computed:{proxyChecked:{get:function(){return this.checked},set:function(e){this.$emit("update:checked",e)}}}});const l=(0,o(3744).Z)(s,[["render",function(e,t,o,s,l,i){return(0,n.withDirectives)(((0,n.openBlock)(),(0,n.createElementBlock)("input",{type:"checkbox",value:e.value,"onUpdate:modelValue":t[0]||(t[0]=function(t){return e.proxyChecked=t}),class:"rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"},null,8,r)),[[n.vModelCheckbox,e.proxyChecked]])}]])},3309:(e,t,o)=>{o.d(t,{Z:()=>l});var n=o(821),r=["type"];const s=(0,n.defineComponent)({props:{type:{type:String,default:"button"}}});const l=(0,o(3744).Z)(s,[["render",function(e,t,o,s,l,i){return(0,n.openBlock)(),(0,n.createElementBlock)("button",{type:e.type,class:"inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition"},[(0,n.renderSlot)(e.$slots,"default")],8,r)}]])},7637:(e,t,o)=>{o.d(t,{Z:()=>d});var n=o(821),r={class:"px-6 py-4"},s={class:"text-lg"},l={class:"mt-4"},i={class:"flex flex-row justify-end px-6 py-4 bg-gray-100 text-right"};var a=o(5658);const c=(0,n.defineComponent)({emits:["close"],components:{Modal:a.Z},props:{show:{default:!1},maxWidth:{default:"2xl"},closeable:{default:!0}},methods:{close:function(){this.$emit("close")}}});const d=(0,o(3744).Z)(c,[["render",function(e,t,o,a,c,d){var u=(0,n.resolveComponent)("modal");return(0,n.openBlock)(),(0,n.createBlock)(u,{show:e.show,"max-width":e.maxWidth,closeable:e.closeable,onClose:e.close},{default:(0,n.withCtx)((function(){return[(0,n.createElementVNode)("div",r,[(0,n.createElementVNode)("div",s,[(0,n.renderSlot)(e.$slots,"title")]),(0,n.createElementVNode)("div",l,[(0,n.renderSlot)(e.$slots,"content")])]),(0,n.createElementVNode)("div",i,[(0,n.renderSlot)(e.$slots,"footer")])]})),_:3},8,["show","max-width","closeable","onClose"])}]])},9153:(e,t,o)=>{o.d(t,{Z:()=>d});var n=o(821),r={class:"md:grid md:grid-cols-3 md:gap-6"},s={class:"mt-5 md:mt-0 md:col-span-2"},l={class:"grid grid-cols-6 gap-6"},i={key:0,class:"flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md"};var a=o(5218);const c=(0,n.defineComponent)({emits:["submitted"],components:{JetSectionTitle:a.Z},computed:{hasActions:function(){return!!this.$slots.actions}}});const d=(0,o(3744).Z)(c,[["render",function(e,t,o,a,c,d){var u=(0,n.resolveComponent)("jet-section-title");return(0,n.openBlock)(),(0,n.createElementBlock)("div",r,[(0,n.createVNode)(u,null,{title:(0,n.withCtx)((function(){return[(0,n.renderSlot)(e.$slots,"title")]})),description:(0,n.withCtx)((function(){return[(0,n.renderSlot)(e.$slots,"description")]})),_:3}),(0,n.createElementVNode)("div",s,[(0,n.createElementVNode)("form",{onSubmit:t[0]||(t[0]=(0,n.withModifiers)((function(t){return e.$emit("submitted")}),["prevent"]))},[(0,n.createElementVNode)("div",{class:(0,n.normalizeClass)(["px-4 py-5 bg-white sm:p-6 shadow",e.hasActions?"sm:rounded-tl-md sm:rounded-tr-md":"sm:rounded-md"])},[(0,n.createElementVNode)("div",l,[(0,n.renderSlot)(e.$slots,"form")])],2),e.hasActions?((0,n.openBlock)(),(0,n.createElementBlock)("div",i,[(0,n.renderSlot)(e.$slots,"actions")])):(0,n.createCommentVNode)("",!0)],32)])])}]])},7292:(e,t,o)=>{o.d(t,{Z:()=>l});var n=o(821),r=["value"];const s=(0,n.defineComponent)({props:["modelValue"],emits:["update:modelValue"],methods:{focus:function(){this.$refs.input.focus()}}});const l=(0,o(3744).Z)(s,[["render",function(e,t,o,s,l,i){return(0,n.openBlock)(),(0,n.createElementBlock)("input",{class:"border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",value:e.modelValue,onInput:t[0]||(t[0]=function(t){return e.$emit("update:modelValue",t.target.value)}),ref:"input"},null,40,r)}]])},675:(e,t,o)=>{o.d(t,{Z:()=>l});var n=o(821),r={class:"text-sm text-red-600"};const s=(0,n.defineComponent)({props:["message"]});const l=(0,o(3744).Z)(s,[["render",function(e,t,o,s,l,i){return(0,n.withDirectives)(((0,n.openBlock)(),(0,n.createElementBlock)("div",null,[(0,n.createElementVNode)("p",r,(0,n.toDisplayString)(e.message),1)],512)),[[n.vShow,e.message]])}]])},6138:(e,t,o)=>{o.d(t,{Z:()=>a});var n=o(821),r={class:"block font-medium text-sm text-gray-700"},s={key:0},l={key:1};const i=(0,n.defineComponent)({props:["value"]});const a=(0,o(3744).Z)(i,[["render",function(e,t,o,i,a,c){return(0,n.openBlock)(),(0,n.createElementBlock)("label",r,[e.value?((0,n.openBlock)(),(0,n.createElementBlock)("span",s,(0,n.toDisplayString)(e.value),1)):((0,n.openBlock)(),(0,n.createElementBlock)("span",l,[(0,n.renderSlot)(e.$slots,"default")]))])}]])},5658:(e,t,o)=>{o.d(t,{Z:()=>i});var n=o(821),r={class:"fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50","scroll-region":""},s=[(0,n.createElementVNode)("div",{class:"absolute inset-0 bg-gray-500 opacity-75"},null,-1)];const l=(0,n.defineComponent)({emits:["close"],props:{show:{default:!1},maxWidth:{default:"2xl"},closeable:{default:!0}},watch:{show:{immediate:!0,handler:function(e){document.body.style.overflow=e?"hidden":null}}},setup:function(e,t){var o=t.emit,r=function(){e.closeable&&o("close")},s=function(t){"Escape"===t.key&&e.show&&r()};return(0,n.onMounted)((function(){return document.addEventListener("keydown",s)})),(0,n.onUnmounted)((function(){document.removeEventListener("keydown",s),document.body.style.overflow=null})),{close:r}},computed:{maxWidthClass:function(){return{sm:"sm:max-w-sm",md:"sm:max-w-md",lg:"sm:max-w-lg",xl:"sm:max-w-xl","2xl":"sm:max-w-2xl"}[this.maxWidth]}}});const i=(0,o(3744).Z)(l,[["render",function(e,t,o,l,i,a){return(0,n.openBlock)(),(0,n.createBlock)(n.Teleport,{to:"body"},[(0,n.createVNode)(n.Transition,{"leave-active-class":"duration-200"},{default:(0,n.withCtx)((function(){return[(0,n.withDirectives)((0,n.createElementVNode)("div",r,[(0,n.createVNode)(n.Transition,{"enter-active-class":"ease-out duration-300","enter-from-class":"opacity-0","enter-to-class":"opacity-100","leave-active-class":"ease-in duration-200","leave-from-class":"opacity-100","leave-to-class":"opacity-0"},{default:(0,n.withCtx)((function(){return[(0,n.withDirectives)((0,n.createElementVNode)("div",{class:"fixed inset-0 transform transition-all",onClick:t[0]||(t[0]=function(){return e.close&&e.close.apply(e,arguments)})},s,512),[[n.vShow,e.show]])]})),_:1}),(0,n.createVNode)(n.Transition,{"enter-active-class":"ease-out duration-300","enter-from-class":"opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95","enter-to-class":"opacity-100 translate-y-0 sm:scale-100","leave-active-class":"ease-in duration-200","leave-from-class":"opacity-100 translate-y-0 sm:scale-100","leave-to-class":"opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"},{default:(0,n.withCtx)((function(){return[(0,n.withDirectives)((0,n.createElementVNode)("div",{class:(0,n.normalizeClass)(["mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto",e.maxWidthClass])},[e.show?(0,n.renderSlot)(e.$slots,"default",{key:0}):(0,n.createCommentVNode)("",!0)],2),[[n.vShow,e.show]])]})),_:3})],512),[[n.vShow,e.show]])]})),_:3})])}]])},5515:(e,t,o)=>{o.d(t,{Z:()=>l});var n=o(821),r=["type"];const s=(0,n.defineComponent)({props:{type:{type:String,default:"button"}}});const l=(0,o(3744).Z)(s,[["render",function(e,t,o,s,l,i){return(0,n.openBlock)(),(0,n.createElementBlock)("button",{type:e.type,class:"inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition"},[(0,n.renderSlot)(e.$slots,"default")],8,r)}]])},913:(e,t,o)=>{o.d(t,{Z:()=>i});var n=o(821),r={class:"hidden sm:block"},s=[(0,n.createElementVNode)("div",{class:"py-8"},[(0,n.createElementVNode)("div",{class:"border-t border-gray-200"})],-1)];const l={},i=(0,o(3744).Z)(l,[["render",function(e,t){return(0,n.openBlock)(),(0,n.createElementBlock)("div",r,s)}]])},5218:(e,t,o)=>{o.d(t,{Z:()=>d});var n=o(821),r={class:"md:col-span-1 flex justify-between"},s={class:"px-4 sm:px-0"},l={class:"text-lg font-medium text-gray-900"},i={class:"mt-1 text-sm text-gray-600"},a={class:"px-4 sm:px-0"};const c={},d=(0,o(3744).Z)(c,[["render",function(e,t){return(0,n.openBlock)(),(0,n.createElementBlock)("div",r,[(0,n.createElementVNode)("div",s,[(0,n.createElementVNode)("h3",l,[(0,n.renderSlot)(e.$slots,"title")]),(0,n.createElementVNode)("p",i,[(0,n.renderSlot)(e.$slots,"description")])]),(0,n.createElementVNode)("div",a,[(0,n.renderSlot)(e.$slots,"aside")])])}]])},421:(e,t,o)=>{o.r(t),o.d(t,{default:()=>le});var n=o(821),r=(0,n.createTextVNode)(" Create API Token "),s=(0,n.createTextVNode)(" API tokens allow third-party services to authenticate with our application on your behalf. "),l={class:"col-span-6 sm:col-span-4"},i={key:0,class:"col-span-6"},a={class:"mt-2 grid grid-cols-1 md:grid-cols-2 gap-4"},c={class:"flex items-center"},d={class:"ml-2 text-sm text-gray-600"},u=(0,n.createTextVNode)(" Created. "),m=(0,n.createTextVNode)(" Create "),p={key:0},f={class:"mt-10 sm:mt-0"},k=(0,n.createTextVNode)(" Manage API Tokens "),h=(0,n.createTextVNode)(" You may delete any of your existing tokens if they are no longer needed. "),v={class:"space-y-6"},g={class:"flex items-center"},x={key:0,class:"text-sm text-gray-400"},y=["onClick"],w=["onClick"],C=(0,n.createTextVNode)(" API Token "),b=(0,n.createElementVNode)("div",null," Please copy your new API token. For your security, it won't be shown again. ",-1),V={key:0,class:"mt-4 bg-gray-100 px-4 py-2 rounded font-mono text-sm text-gray-500"},N=(0,n.createTextVNode)(" Close "),E=(0,n.createTextVNode)(" API Token Permissions "),B={class:"grid grid-cols-1 md:grid-cols-2 gap-4"},T={class:"flex items-center"},S={class:"ml-2 text-sm text-gray-600"},A=(0,n.createTextVNode)(" Cancel "),Z=(0,n.createTextVNode)(" Save "),F=(0,n.createTextVNode)(" Delete API Token "),$=(0,n.createTextVNode)(" Are you sure you would like to delete this API token? "),P=(0,n.createTextVNode)(" Cancel "),D=(0,n.createTextVNode)(" Delete ");var _=o(8789),j=o(8050),J=o(7020),I={class:"bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4"},M={class:"sm:flex sm:items-start"},L=(0,n.createElementVNode)("div",{class:"mx-auto shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10"},[(0,n.createElementVNode)("svg",{class:"h-6 w-6 text-red-600",stroke:"currentColor",fill:"none",viewBox:"0 0 24 24"},[(0,n.createElementVNode)("path",{"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"})])],-1),W={class:"mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left"},z={class:"text-lg"},U={class:"mt-2"},O={class:"flex flex-row justify-end px-6 py-4 bg-gray-100 text-right"};var Y=o(5658);const q=(0,n.defineComponent)({emits:["close"],components:{Modal:Y.Z},props:{show:{default:!1},maxWidth:{default:"2xl"},closeable:{default:!0}},methods:{close:function(){this.$emit("close")}}});var G=o(3744);const H=(0,G.Z)(q,[["render",function(e,t,o,r,s,l){var i=(0,n.resolveComponent)("modal");return(0,n.openBlock)(),(0,n.createBlock)(i,{show:e.show,"max-width":e.maxWidth,closeable:e.closeable,onClose:e.close},{default:(0,n.withCtx)((function(){return[(0,n.createElementVNode)("div",I,[(0,n.createElementVNode)("div",M,[L,(0,n.createElementVNode)("div",W,[(0,n.createElementVNode)("h3",z,[(0,n.renderSlot)(e.$slots,"title")]),(0,n.createElementVNode)("div",U,[(0,n.renderSlot)(e.$slots,"content")])])])]),(0,n.createElementVNode)("div",O,[(0,n.renderSlot)(e.$slots,"footer")])]})),_:3},8,["show","max-width","closeable","onClose"])}]]);var K=o(3309),Q=o(7637),R=o(9153),X=o(7292),ee=o(6552),te=o(675),oe=o(6138),ne=o(5515),re=o(913);const se=(0,n.defineComponent)({components:{JetActionMessage:_.Z,JetActionSection:j.Z,JetButton:J.Z,JetConfirmationModal:H,JetDangerButton:K.Z,JetDialogModal:Q.Z,JetFormSection:R.Z,JetInput:X.Z,JetCheckbox:ee.Z,JetInputError:te.Z,JetLabel:oe.Z,JetSecondaryButton:ne.Z,JetSectionBorder:re.Z},props:["tokens","availablePermissions","defaultPermissions"],data:function(){return{createApiTokenForm:this.$inertia.form({name:"",permissions:this.defaultPermissions}),updateApiTokenForm:this.$inertia.form({permissions:[]}),deleteApiTokenForm:this.$inertia.form(),displayingToken:!1,managingPermissionsFor:null,apiTokenBeingDeleted:null}},methods:{createApiToken:function(){var e=this;this.createApiTokenForm.post(route("api-tokens.store"),{preserveScroll:!0,onSuccess:function(){e.displayingToken=!0,e.createApiTokenForm.reset()}})},manageApiTokenPermissions:function(e){this.updateApiTokenForm.permissions=e.abilities,this.managingPermissionsFor=e},updateApiToken:function(){var e=this;this.updateApiTokenForm.put(route("api-tokens.update",this.managingPermissionsFor),{preserveScroll:!0,preserveState:!0,onSuccess:function(){return e.managingPermissionsFor=null}})},confirmApiTokenDeletion:function(e){this.apiTokenBeingDeleted=e},deleteApiToken:function(){var e=this;this.deleteApiTokenForm.delete(route("api-tokens.destroy",this.apiTokenBeingDeleted),{preserveScroll:!0,preserveState:!0,onSuccess:function(){return e.apiTokenBeingDeleted=null}})}}}),le=(0,G.Z)(se,[["render",function(e,t,o,_,j,J){var I=(0,n.resolveComponent)("jet-label"),M=(0,n.resolveComponent)("jet-input"),L=(0,n.resolveComponent)("jet-input-error"),W=(0,n.resolveComponent)("jet-checkbox"),z=(0,n.resolveComponent)("jet-action-message"),U=(0,n.resolveComponent)("jet-button"),O=(0,n.resolveComponent)("jet-form-section"),Y=(0,n.resolveComponent)("jet-section-border"),q=(0,n.resolveComponent)("jet-action-section"),G=(0,n.resolveComponent)("jet-secondary-button"),H=(0,n.resolveComponent)("jet-dialog-modal"),K=(0,n.resolveComponent)("jet-danger-button"),Q=(0,n.resolveComponent)("jet-confirmation-modal");return(0,n.openBlock)(),(0,n.createElementBlock)("div",null,[(0,n.createVNode)(O,{onSubmitted:e.createApiToken},{title:(0,n.withCtx)((function(){return[r]})),description:(0,n.withCtx)((function(){return[s]})),form:(0,n.withCtx)((function(){return[(0,n.createElementVNode)("div",l,[(0,n.createVNode)(I,{for:"name",value:"Name"}),(0,n.createVNode)(M,{id:"name",type:"text",class:"mt-1 block w-full",modelValue:e.createApiTokenForm.name,"onUpdate:modelValue":t[0]||(t[0]=function(t){return e.createApiTokenForm.name=t}),autofocus:""},null,8,["modelValue"]),(0,n.createVNode)(L,{message:e.createApiTokenForm.errors.name,class:"mt-2"},null,8,["message"])]),e.availablePermissions.length>0?((0,n.openBlock)(),(0,n.createElementBlock)("div",i,[(0,n.createVNode)(I,{for:"permissions",value:"Permissions"}),(0,n.createElementVNode)("div",a,[((0,n.openBlock)(!0),(0,n.createElementBlock)(n.Fragment,null,(0,n.renderList)(e.availablePermissions,(function(o){return(0,n.openBlock)(),(0,n.createElementBlock)("div",{key:o},[(0,n.createElementVNode)("label",c,[(0,n.createVNode)(W,{value:o,checked:e.createApiTokenForm.permissions,"onUpdate:checked":t[1]||(t[1]=function(t){return e.createApiTokenForm.permissions=t})},null,8,["value","checked"]),(0,n.createElementVNode)("span",d,(0,n.toDisplayString)(o),1)])])})),128))])])):(0,n.createCommentVNode)("",!0)]})),actions:(0,n.withCtx)((function(){return[(0,n.createVNode)(z,{on:e.createApiTokenForm.recentlySuccessful,class:"mr-3"},{default:(0,n.withCtx)((function(){return[u]})),_:1},8,["on"]),(0,n.createVNode)(U,{class:(0,n.normalizeClass)({"opacity-25":e.createApiTokenForm.processing}),disabled:e.createApiTokenForm.processing},{default:(0,n.withCtx)((function(){return[m]})),_:1},8,["class","disabled"])]})),_:1},8,["onSubmitted"]),e.tokens.length>0?((0,n.openBlock)(),(0,n.createElementBlock)("div",p,[(0,n.createVNode)(Y),(0,n.createElementVNode)("div",f,[(0,n.createVNode)(q,null,{title:(0,n.withCtx)((function(){return[k]})),description:(0,n.withCtx)((function(){return[h]})),content:(0,n.withCtx)((function(){return[(0,n.createElementVNode)("div",v,[((0,n.openBlock)(!0),(0,n.createElementBlock)(n.Fragment,null,(0,n.renderList)(e.tokens,(function(t){return(0,n.openBlock)(),(0,n.createElementBlock)("div",{class:"flex items-center justify-between",key:t.id},[(0,n.createElementVNode)("div",null,(0,n.toDisplayString)(t.name),1),(0,n.createElementVNode)("div",g,[t.last_used_ago?((0,n.openBlock)(),(0,n.createElementBlock)("div",x," Last used "+(0,n.toDisplayString)(t.last_used_ago),1)):(0,n.createCommentVNode)("",!0),e.availablePermissions.length>0?((0,n.openBlock)(),(0,n.createElementBlock)("button",{key:1,class:"cursor-pointer ml-6 text-sm text-gray-400 underline",onClick:function(o){return e.manageApiTokenPermissions(t)}}," Permissions ",8,y)):(0,n.createCommentVNode)("",!0),(0,n.createElementVNode)("button",{class:"cursor-pointer ml-6 text-sm text-red-500",onClick:function(o){return e.confirmApiTokenDeletion(t)}}," Delete ",8,w)])])})),128))])]})),_:1})])])):(0,n.createCommentVNode)("",!0),(0,n.createVNode)(H,{show:e.displayingToken,onClose:t[3]||(t[3]=function(t){return e.displayingToken=!1})},{title:(0,n.withCtx)((function(){return[C]})),content:(0,n.withCtx)((function(){return[b,e.$page.props.jetstream.flash.token?((0,n.openBlock)(),(0,n.createElementBlock)("div",V,(0,n.toDisplayString)(e.$page.props.jetstream.flash.token),1)):(0,n.createCommentVNode)("",!0)]})),footer:(0,n.withCtx)((function(){return[(0,n.createVNode)(G,{onClick:t[2]||(t[2]=function(t){return e.displayingToken=!1})},{default:(0,n.withCtx)((function(){return[N]})),_:1})]})),_:1},8,["show"]),(0,n.createVNode)(H,{show:e.managingPermissionsFor,onClose:t[6]||(t[6]=function(t){return e.managingPermissionsFor=null})},{title:(0,n.withCtx)((function(){return[E]})),content:(0,n.withCtx)((function(){return[(0,n.createElementVNode)("div",B,[((0,n.openBlock)(!0),(0,n.createElementBlock)(n.Fragment,null,(0,n.renderList)(e.availablePermissions,(function(o){return(0,n.openBlock)(),(0,n.createElementBlock)("div",{key:o},[(0,n.createElementVNode)("label",T,[(0,n.createVNode)(W,{value:o,checked:e.updateApiTokenForm.permissions,"onUpdate:checked":t[4]||(t[4]=function(t){return e.updateApiTokenForm.permissions=t})},null,8,["value","checked"]),(0,n.createElementVNode)("span",S,(0,n.toDisplayString)(o),1)])])})),128))])]})),footer:(0,n.withCtx)((function(){return[(0,n.createVNode)(G,{onClick:t[5]||(t[5]=function(t){return e.managingPermissionsFor=null})},{default:(0,n.withCtx)((function(){return[A]})),_:1}),(0,n.createVNode)(U,{class:(0,n.normalizeClass)(["ml-3",{"opacity-25":e.updateApiTokenForm.processing}]),onClick:e.updateApiToken,disabled:e.updateApiTokenForm.processing},{default:(0,n.withCtx)((function(){return[Z]})),_:1},8,["onClick","class","disabled"])]})),_:1},8,["show"]),(0,n.createVNode)(Q,{show:e.apiTokenBeingDeleted,onClose:t[8]||(t[8]=function(t){return e.apiTokenBeingDeleted=null})},{title:(0,n.withCtx)((function(){return[F]})),content:(0,n.withCtx)((function(){return[$]})),footer:(0,n.withCtx)((function(){return[(0,n.createVNode)(G,{onClick:t[7]||(t[7]=function(t){return e.apiTokenBeingDeleted=null})},{default:(0,n.withCtx)((function(){return[P]})),_:1}),(0,n.createVNode)(K,{class:(0,n.normalizeClass)(["ml-3",{"opacity-25":e.deleteApiTokenForm.processing}]),onClick:e.deleteApiToken,disabled:e.deleteApiTokenForm.processing},{default:(0,n.withCtx)((function(){return[D]})),_:1},8,["onClick","class","disabled"])]})),_:1},8,["show"])])}]])}}]);