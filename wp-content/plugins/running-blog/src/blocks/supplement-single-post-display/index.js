import { registerBlockType } from "@wordpress/blocks"
import { useBlockProps } from "@wordpress/block-editor"
import block from "./block.json"
import icons from "../../icons.js"

// comment! asdf

registerBlockType(block.name, {
  icon: icons.primary,
  edit({ attributes, setAttributes }) {
    const blockProps = useBlockProps()
    return (
      <>
        <div id="supplement-single-post-display" {...blockProps}>
          <p>This is the supplement single post display</p>
          <p>
            The data will be rendered on the back end and displayed on the post.
          </p>
        </div>
      </>
    )
  }
})
