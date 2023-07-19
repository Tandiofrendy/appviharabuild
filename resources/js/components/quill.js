import Quill from "quill/dist/quill.min";

export default (el, { modifiers, expression }, { evaluateLater }) => {
  if (expression) {
    const getContent = evaluateLater(expression);
    getContent((options) => (el.__x_quill = new Quill(el, options)));
  } else {
    el.__x_quill = new Quill(el, defaultConfig(modifiers));
  }
};

const defaultConfig = (modifiers) => {
  let modules = {};
  if (modifiers.includes("minimal")) {
    modules = {
      toolbar: [
        ["bold", "italic", "underline"],
        [
          { list: "ordered" },
          { list: "bullet" },
          { header: 1 },
          { background: [] },
        ],
      ],
    };
  } else {
    modules = {
      toolbar: [
        ["bold", "italic", "underline", "strike"], // toggled buttons
        ["blockquote", "code-block"],
        [{ header: 1 }, { header: 2 }], // custom button values
        [{ list: "ordered" }, { list: "bullet" }],
        [{ script: "sub" }, { script: "super" }], // superscript/subscript
        [{ indent: "-1" }, { indent: "+1" }], // outdent/indent
        [{ direction: "rtl" }], // text direction
        [{ size: ["small", false, "large", "huge"] }], // custom dropdown
        [{ header: [1, 2, 3, 4, 5, 6, false] }],
        [{ color: [] }, { background: [] }], // dropdown with defaults from theme
        [{ font: [] }],
        [{ align: [] }],
        ["clean"], // remove formatting button
      ],
    };
  }
  return {
    modules,
    placeholder: "Enter your content...",
    theme: "snow",
  };
};
