System.register(["./chunk-vendor.js"],(function(){"use strict";var e,t,s;return{setters:[function(c){e=c.a,t=c.o,s=c.r}],execute:function(){function c(){for(const e of document.querySelectorAll(".js-newsletter-frequency-choice.selected"))e.classList.remove("selected");document.querySelector(".js-newsletter-frequency-radio:enabled:checked").closest(".js-newsletter-frequency-choice").classList.add("selected")}e(".js-subscription-toggle",(function(){c()})),t("change",".js-newsletter-frequency-radio",(function(){c()})),s(".js-subscription-toggle",(async function(e,t){await t.text();const s=e.querySelector(".selected .notice");s.classList.add("visible"),setTimeout((function(){s.classList.remove("visible")}),2e3)}))}}}));
//# sourceMappingURL=explore-14f1d76c.js.map
