/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */
var __decorate=this&&this.__decorate||function(e,t,o,l){var r,n=arguments.length,s=n<3?t:null===l?l=Object.getOwnPropertyDescriptor(t,o):l;if("object"==typeof Reflect&&"function"==typeof Reflect.decorate)s=Reflect.decorate(e,t,o,l);else for(var c=e.length-1;c>=0;c--)(r=e[c])&&(s=(n<3?r(s):n>3?r(t,o,s):r(t,o))||s);return n>3&&s&&Object.defineProperty(t,o,s),s},__importDefault=this&&this.__importDefault||function(e){return e&&e.__esModule?e:{default:e}};define(["require","exports","lit","lit/decorators","TYPO3/CMS/Backend/Enum/Severity","TYPO3/CMS/Backend/Severity","TYPO3/CMS/Backend/Modal","TYPO3/CMS/Core/lit-helper","TYPO3/CMS/Core/Ajax/AjaxRequest","TYPO3/CMS/Backend/Notification"],(function(e,t,o,l,r,n,s,c,i,a){"use strict";var d,u,p;Object.defineProperty(t,"__esModule",{value:!0}),i=__importDefault(i),function(e){e.columnsSelector=".t3js-column-selector",e.columnsContainerSelector=".t3js-column-selector-container",e.columnsFilterSelector='input[name="columns-filter"]',e.columnsSelectorActionsSelector=".t3js-column-selector-actions"}(u||(u={})),function(e){e.toggle="select-toggle",e.all="select-all",e.none="select-none"}(p||(p={}));let m=d=class extends o.LitElement{static toggleSelectorActions(e,t,o,l=!1){t.classList.add("disabled");for(let o=0;o<e.length;o++)if(!e[o].disabled&&!e[o].checked&&(l||!d.isColumnHidden(e[o]))){t.classList.remove("disabled");break}o.classList.add("disabled");for(let t=0;t<e.length;t++)if(!e[t].disabled&&e[t].checked&&(l||!d.isColumnHidden(e[t]))){o.classList.remove("disabled");break}}static isColumnHidden(e){var t;return null===(t=e.closest(u.columnsContainerSelector))||void 0===t?void 0:t.classList.contains("hidden")}static filterColumns(e,t){t.forEach(t=>{var o;const l=t.closest(u.columnsContainerSelector);if(!t.disabled&&null!==l){const t=null===(o=l.querySelector(".form-check-label-text"))||void 0===o?void 0:o.textContent;t&&t.length&&l.classList.toggle("hidden",""!==e.value&&!RegExp(e.value,"i").test(t.trim().replace(/\[\]/g,"").replace(/\s+/g," ")))}})}constructor(){super(),this.title="Show columns",this.ok=(0,c.lll)("button.ok")||"Update",this.close=(0,c.lll)("button.close")||"Close",this.error="Could not update columns",this.addEventListener("click",e=>{e.preventDefault(),this.showColumnSelectorModal()})}render(){return o.html`<slot></slot>`}showColumnSelectorModal(){this.url&&this.target&&s.advanced({content:this.url,title:this.title,severity:r.SeverityEnum.notice,size:s.sizes.medium,type:s.types.ajax,buttons:[{text:this.close,active:!0,btnClass:"btn-default",name:"cancel",trigger:()=>s.dismiss()},{text:this.ok,btnClass:"btn-"+n.getCssClass(r.SeverityEnum.info),name:"update",trigger:()=>this.proccessSelection(s.currentModal[0])}],ajaxCallback:()=>this.handleModalContentLoaded(s.currentModal[0])})}proccessSelection(e){const t=e.querySelector("form");null!==t?new i.default(TYPO3.settings.ajaxUrls.show_columns).post("",{body:new FormData(t)}).then(async e=>{const t=await e.resolve();!0===t.success?(this.ownerDocument.location.href=this.target,this.ownerDocument.location.reload()):a.error(t.message||"No update was performed"),s.dismiss()}).catch(()=>{this.abortSelection()}):this.abortSelection()}handleModalContentLoaded(e){const t=e.querySelector("form");if(null===t)return;t.addEventListener("submit",e=>{e.preventDefault()});const o=e.querySelectorAll(u.columnsSelector),l=e.querySelector(u.columnsFilterSelector),r=e.querySelector(u.columnsSelectorActionsSelector),n=r.querySelector('button[data-action="'+p.all+'"]'),s=r.querySelector('button[data-action="'+p.none+'"]');o.length&&null!==l&&null!==n&&null!==s&&(d.toggleSelectorActions(o,n,s,!0),o.forEach(e=>{e.addEventListener("change",()=>{d.toggleSelectorActions(o,n,s)})}),l.addEventListener("keydown",e=>{const t=e.target;"Escape"===e.code&&(e.stopImmediatePropagation(),t.value="")}),l.addEventListener("keyup",e=>{d.filterColumns(e.target,o),d.toggleSelectorActions(o,n,s)}),l.addEventListener("search",e=>{d.filterColumns(e.target,o),d.toggleSelectorActions(o,n,s)}),r.querySelectorAll("button[data-action]").forEach(e=>{e.addEventListener("click",e=>{e.preventDefault();const t=e.currentTarget;if(t.dataset.action){switch(t.dataset.action){case p.toggle:o.forEach(e=>{e.disabled||d.isColumnHidden(e)||(e.checked=!e.checked)});break;case p.all:o.forEach(e=>{e.disabled||d.isColumnHidden(e)||(e.checked=!0)});break;case p.none:o.forEach(e=>{e.disabled||d.isColumnHidden(e)||(e.checked=!1)});break;default:a.warning("Unknown selector action")}d.toggleSelectorActions(o,n,s)}})}))}abortSelection(){a.error(this.error),s.dismiss()}};__decorate([(0,l.property)({type:String})],m.prototype,"url",void 0),__decorate([(0,l.property)({type:String})],m.prototype,"target",void 0),__decorate([(0,l.property)({type:String})],m.prototype,"title",void 0),__decorate([(0,l.property)({type:String})],m.prototype,"ok",void 0),__decorate([(0,l.property)({type:String})],m.prototype,"close",void 0),__decorate([(0,l.property)({type:String})],m.prototype,"error",void 0),m=d=__decorate([(0,l.customElement)("typo3-backend-column-selector-button")],m)}));