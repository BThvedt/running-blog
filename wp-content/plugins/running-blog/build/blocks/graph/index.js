/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/icons.js":
/*!**********************!*\
  !*** ./src/icons.js ***!
  \**********************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);

/* harmony default export */ __webpack_exports__["default"] = ({
  primary: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    version: "1.1",
    id: "Capa_1",
    xmlns: "http://www.w3.org/2000/svg",
    viewBox: "0 0 21.803 21.803",
    "enable-background": "new 0 0 21.803 21.803"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    fill: "#030104",
    d: "M18.374,16.605l-4.076-2.101l-1.107-1.773l-0.757-4.503l2.219,1.092l-0.375,1.494\r c-0.13,0.519,0.185,1.041,0.699,1.17c0.077,0.021,0.157,0.03,0.235,0.03c0.432-0.002,0.823-0.293,0.935-0.729l0.565-2.25\r c0.11-0.439-0.103-0.897-0.511-1.101c0,0-5.303-2.603-5.328-2.612c-0.406-0.188-0.868-0.267-1.342-0.198\r c-0.625,0.088-1.158,0.407-1.528,0.86c-0.029,0.027-2.565,3.15-2.565,3.15l-1.95,0.525C2.974,9.8,2.67,10.327,2.809,10.843\r c0.116,0.43,0.505,0.713,0.93,0.713c0.083,0,0.168-0.011,0.252-0.033l2.252-0.606c0.196-0.055,0.37-0.167,0.498-0.324L7.75,9.346\r l0.725,4.026l-1.27,1.01c-0.379,0.304-0.541,0.802-0.411,1.269l1.469,5.271c0.148,0.532,0.633,0.881,1.16,0.881\r c0.107,0,0.216-0.015,0.324-0.045c0.641-0.178,1.016-0.842,0.837-1.482L9.33,15.774l1.948-1.498l1.151,1.791\r c0.115,0.186,0.277,0.334,0.471,0.436l4.371,2.25c0.177,0.092,0.363,0.135,0.552,0.135c0.438,0,0.856-0.238,1.072-0.653\r C19.198,17.635,18.965,16.91,18.374,16.605z"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("circle", {
    fill: "#030104",
    cx: "8.602",
    cy: "2.568",
    r: "2.568"
  })))
});

/***/ }),

/***/ "./src/blocks/graph/main.css":
/*!***********************************!*\
  !*** ./src/blocks/graph/main.css ***!
  \***********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ (function(module) {

module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/***/ (function(module) {

module.exports = window["wp"]["blocks"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ (function(module) {

module.exports = window["wp"]["components"];

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ (function(module) {

module.exports = window["wp"]["element"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ (function(module) {

module.exports = window["wp"]["i18n"];

/***/ }),

/***/ "./src/blocks/graph/block.json":
/*!*************************************!*\
  !*** ./src/blocks/graph/block.json ***!
  \*************************************/
/***/ (function(module) {

module.exports = JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":2,"name":"running-blog/graph","title":"Graph","category":"widgets","description":"Adds a graph","keywords":["search"],"version":"1","textdomain":"running-blog","editorScript":"file:./index.js","attributes":{"graphType":{"type":"string","default":"Select"},"dataType":{"type":"string","default":"Select"},"span":{"type":"number","default":6}},"style":"file:./index.css"}');

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	!function() {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = function(module) {
/******/ 			var getter = module && module.__esModule ?
/******/ 				function() { return module['default']; } :
/******/ 				function() { return module; };
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
!function() {
/*!***********************************!*\
  !*** ./src/blocks/graph/index.js ***!
  \***********************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./block.json */ "./src/blocks/graph/block.json");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _icons_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../../icons.js */ "./src/icons.js");
/* harmony import */ var _main_css__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./main.css */ "./src/blocks/graph/main.css");









const runArray = [{
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Run Distance"),
  value: "run_distance"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Minutes per Mile"),
  value: "minutes_per_mile"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Time of Day"),
  value: "run_time_of_day"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Vest Weight"),
  value: "vest_weight"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Arm Weight"),
  value: "arm_weight"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Leg Weight"),
  value: "leg_weight"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Other Weight"),
  value: "other_weight"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Total Weight"),
  value: "total_weight"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Run Distance"),
  value: "run_distance"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Humidity"),
  value: "run_distance"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Wind"),
  value: "run_distance"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Heart Rate"),
  value: "run_distance"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Power"),
  value: "run_distance"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Elevation Gained"),
  value: "run_distance"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Cadence"),
  value: "run_distance"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Stride Length"),
  value: "run_distance"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Ground Contact"),
  value: "run_distance"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Vertical Osc"),
  value: "run_distance"
}];
const raceArray = [{
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Race Length"),
  value: "race_length"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Time Start"),
  value: "time_start"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Pace Goal"),
  value: "pace_goal"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Actual Pace"),
  value: "actual_pace"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Temperature"),
  value: "temperature"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Humidity"),
  value: "humidity"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Wind"),
  value: "wind"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Hill Difficulty"),
  value: "hill_difficulty"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Stride Length"),
  value: "stride_length	"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Bround Contact"),
  value: "ground_contact"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Vertical Osc"),
  value: "vert_osc"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Heart Rate"),
  value: "average_heart_rate"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Power"),
  value: "power"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Elevation Gained"),
  value: "elevation_gained"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Cadence"),
  value: "cadence"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Starting Energy"),
  value: "starting_energy"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Percieved Effort Level"),
  value: "percieved_effort_level"
}];
const metaArray = [{
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Is Fast"),
  value: "is_fast"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Body Fat"),
  value: "body_fat"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("BMI"),
  value: "bmi"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Body Water"),
  value: "body_water"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Bone Density"),
  value: "bone_density"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Knee Pain"),
  value: "knee_pain"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Sholder Pain"),
  value: "sholder_pain"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Energy"),
  value: "energy"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Time Awake"),
  value: "time_awake"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Body Weight"),
  value: "body_weight"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Got Stuff Done"),
  value: "got_stuff_done"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Cups of Coffee"),
  value: "cups_of_coffee"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Total Calories"),
  value: "total_calories"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Total Carbs"),
  value: "total_carbs"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Total Protien"),
  value: "total_protien"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Total Fiber"),
  value: "total_fiber"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Total Sugar"),
  value: "total_sugar"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Total Salt"),
  value: "total_salt"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Total Fat"),
  value: "total_fat"
}];
const sleepArray = [{
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Start Time"),
  value: "start_time"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("End TIme"),
  value: "end_time"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Time Awake"),
  value: "awake"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("REM Time"),
  value: "rem"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Core Time"),
  value: "core"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Deep Time"),
  value: "deep"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Sleep Cycles"),
  value: "sleep_cycles"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Sleeping Hr"),
  value: "sleeping_hr"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Sleeping O2"),
  value: "sleeping_o2"
}];
const workoutArray = [{
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Pushup Sets"),
  value: "pushup_sets"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Pushup Number"),
  value: "pushup_number"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Pushup Weight"),
  value: "pushup_weight"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Pullup Sets"),
  value: "pullup_sets"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Pullup Number"),
  value: "pullup_number"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Pullup Weight"),
  value: "pullup_weight"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Plank Sets"),
  value: "plank_sets"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Plank Length"),
  value: "plank_length"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Plank Weight"),
  value: "plank_weight"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Deadlift Sets"),
  value: "deadlift_sets"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Deadlift Number"),
  value: "deadlift_number"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Deadlift Weight"),
  value: "deadlift_weight"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Squat Sets"),
  value: "squat_sets"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Squat Number"),
  value: "squat_number"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Squat Weight"),
  value: "squat_weight"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Jumping Jack Sets"),
  value: "jumping_jack_sets"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Jumping Jack Number"),
  value: "jumping_jack_number"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Jumping Jack Weight"),
  value: "jumping_jack_weight"
}];
const supplementArray = [{
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Cost"),
  value: "daily_cost"
}];
(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__.registerBlockType)(_block_json__WEBPACK_IMPORTED_MODULE_4__.name, {
  icon: {
    src: _icons_js__WEBPACK_IMPORTED_MODULE_6__["default"].primary
  },
  edit(_ref) {
    let {
      attributes,
      setAttributes
    } = _ref;
    const [dataOptions, setDataOptions] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.useState)(runArray);
    const {
      graphType,
      dataType,
      span
    } = attributes;
    const blockProps = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.useBlockProps)();
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
      title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Graph", "running-blog")
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Graph Type", "running-blog"),
      value: graphType,
      options: [{
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Run", "running-blog"),
        value: "run"
      }, {
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Race", "running-blog"),
        value: "race"
      }, {
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Meta", "running-blog"),
        value: "meta"
      }, {
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Sleep", "running-blog"),
        value: "sleep_data"
      }, {
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Workout", "running-blog"),
        value: "workout"
      }, {
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Supplement", "running-blog"),
        value: "supplement"
      }],
      onChange: graphType => {
        switch (graphType) {
          case "select":
            setDataOptions([]);
            break;
          case "run":
            setDataOptions(runArray);
            break;
          case "race":
            setDataOptions(raceArray);
            break;
          case "meta":
            setDataOptions(metaArray);
            break;
          case "sleep_data":
            setDataOptions(sleepArray);
            break;
          case "workout":
            setDataOptions(workoutArray);
            break;
          case "supplement":
            setDataOptions(supplementArray);
            break;
        }
        setAttributes({
          graphType
        });
      }
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Data Type", "running-blog"),
      value: dataType,
      options: dataOptions,
      onChange: dataType => setAttributes({
        dataType
      })
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__.__)("Time Span (months)", "running-blog"),
      onChange: span => setAttributes({
        span
      }),
      value: span
    }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", blockProps, "Graph block"));
  } // use server side for the graphs
});
}();
/******/ })()
;
//# sourceMappingURL=index.js.map