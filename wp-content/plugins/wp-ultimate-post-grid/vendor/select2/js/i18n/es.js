/*! Select2wpupg 4.0.1 | https://github.com/select2wpupg/select2wpupg/blob/master/LICENSE.md */

(function(){if(jQuery&&jQuery.fn&&jQuery.fn.select2wpupg&&jQuery.fn.select2wpupg.amd)var e=jQuery.fn.select2wpupg.amd;return e.define("select2wpupg/i18n/es",[],function(){return{errorLoading:function(){return"La carga falló"},inputTooLong:function(e){var t=e.input.length-e.maximum,n="Por favor, elimine "+t+" car";return t==1?n+="ácter":n+="acteres",n},inputTooShort:function(e){var t=e.minimum-e.input.length,n="Por favor, introduzca "+t+" car";return t==1?n+="ácter":n+="acteres",n},loadingMore:function(){return"Cargando más resultados…"},maximumSelected:function(e){var t="Sólo puede seleccionar "+e.maximum+" elemento";return e.maximum!=1&&(t+="s"),t},noResults:function(){return"No se encontraron resultados"},searching:function(){return"Buscando…"}}}),{define:e.define,require:e.require}})();