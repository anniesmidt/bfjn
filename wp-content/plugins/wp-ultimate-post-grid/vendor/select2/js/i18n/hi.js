/*! Select2wpupg 4.0.1 | https://github.com/select2wpupg/select2wpupg/blob/master/LICENSE.md */

(function(){if(jQuery&&jQuery.fn&&jQuery.fn.select2wpupg&&jQuery.fn.select2wpupg.amd)var e=jQuery.fn.select2wpupg.amd;return e.define("select2wpupg/i18n/hi",[],function(){return{errorLoading:function(){return"परिणामों को लोड नहीं किया जा सका।"},inputTooLong:function(e){var t=e.input.length-e.maximum,n=t+" अक्षर को हटा दें";return t>1&&(n=t+" अक्षरों को हटा दें "),n},inputTooShort:function(e){var t=e.minimum-e.input.length,n="कृपया "+t+" या अधिक अक्षर दर्ज करें";return n},loadingMore:function(){return"अधिक परिणाम लोड हो रहे है..."},maximumSelected:function(e){var t="आप केवल "+e.maximum+" आइटम का चयन कर सकते हैं";return t},noResults:function(){return"कोई परिणाम नहीं मिला"},searching:function(){return"खोज रहा है..."}}}),{define:e.define,require:e.require}})();