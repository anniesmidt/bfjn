/*! Select2wpupg 4.0.1 | https://github.com/select2wpupg/select2wpupg/blob/master/LICENSE.md */

(function(){if(jQuery&&jQuery.fn&&jQuery.fn.select2wpupg&&jQuery.fn.select2wpupg.amd)var e=jQuery.fn.select2wpupg.amd;return e.define("select2wpupg/i18n/lt",[],function(){function e(e,t,n,r){return e%100>9&&e%100<21||e%10===0?e%10>1?n:r:t}return{inputTooLong:function(t){var n=t.input.length-t.maximum,r="Pašalinkite "+n+" simbol";return r+=e(n,"ių","ius","į"),r},inputTooShort:function(t){var n=t.minimum-t.input.length,r="Įrašykite dar "+n+" simbol";return r+=e(n,"ių","ius","į"),r},loadingMore:function(){return"Kraunama daugiau rezultatų…"},maximumSelected:function(t){var n="Jūs galite pasirinkti tik "+t.maximum+" element";return n+=e(t.maximum,"ų","us","ą"),n},noResults:function(){return"Atitikmenų nerasta"},searching:function(){return"Ieškoma…"}}}),{define:e.define,require:e.require}})();