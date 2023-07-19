import Alpine from "alpinejs";

// AlpineJS Plugins
import persist from "@alpinejs/persist";
import collapse from "@alpinejs/collapse";
import intersect from "@alpinejs/intersect";

// Third Party Libraries
import SimpleBar from "simplebar";
import hljs from "highlight.js/lib/core"; // Just for demo purpose only for highlighting code
import xml from "highlight.js/lib/languages/xml"; // Just for demo purpose only for highlighting code
import "@kingshott/iodine";
import dayjs from "dayjs";
import Swiper from "swiper/bundle";
import Sortable from "sortablejs";
import ApexCharts from "apexcharts";
import * as Gridjs from "gridjs";
import "@fortawesome/fontawesome-free/css/all.css";


// Helper Functions
import * as helpers from "./utils/helpers";

// Pages Scripts
import * as pages from "./pages";

// Global Store
import store from "./store";

// Breakpoints Store
import breakpoints from "./utils/breakpoints";

// Alpine Components
import usePopper from "./components/usePopper";
import accordionItem from "./components/accordionItem";

// Alpine Directives
import tooltip from "./components/tooltip";
import inputMask from "./components/inputMask";
import filepond from "./components/filepond";
import tomSelect from "./components/tomSelect";
import quill from "./components/quill";
import flatpickr from "./components/flatpickr";

// Alpine Magic Functions
import notification from "./components/notification";
import clipboard from "./components/clipboard";

hljs.registerLanguage("xml", xml); // Just for demo purpose only for highlighting code
hljs.configure({ ignoreUnescapedHTML: true });

window.hljs = hljs;
window.dayjs = dayjs;
window.SimpleBar = SimpleBar;
window.Swiper = Swiper;
window.Sortable = Sortable;
window.ApexCharts = ApexCharts;
window.Gridjs = Gridjs;

window.Alpine = Alpine;
window.helpers = helpers;
window.pages = pages;

Alpine.plugin(persist);
Alpine.plugin(collapse);
Alpine.plugin(intersect);

Alpine.directive("tooltip", tooltip);
Alpine.directive("input-mask", inputMask);
Alpine.directive("filepond", filepond);
Alpine.directive("tom-select", tomSelect);
Alpine.directive("quill", quill);
Alpine.directive("flatpickr", flatpickr);

Alpine.magic("notification", () => notification);
Alpine.magic("clipboard", () => clipboard);

Alpine.store("breakpoints", breakpoints);
Alpine.store("global", store);

Alpine.data("usePopper", usePopper);
Alpine.data("accordionItem", accordionItem);

