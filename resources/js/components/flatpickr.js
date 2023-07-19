import flatpickr from "flatpickr";
import { indonesia } from "flatpickr/dist/l10n/id.js";

export default (el, { expression }, { evaluateLater, effect }) => {
  if (expression) {
    const getContent = evaluateLater(expression);
    effect(() =>
      getContent(options => (el.__x_flatpickr = flatpickr(el, options)))
    );
  } else {
    el.__x_flatpickr = flatpickr(el);
  }
};
