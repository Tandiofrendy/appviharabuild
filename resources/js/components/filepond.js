import { create, registerPlugin } from "filepond";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
registerPlugin(FilePondPluginImagePreview);

export default (el, { expression }, { evaluateLater, effect }) => {
  if (expression) {
    const getContent = evaluateLater(expression);
    effect(() =>
      getContent((options) => (el.__x_filepond = create(el, options)))
    );
  } else el.__x_filepond = create(el);
};
