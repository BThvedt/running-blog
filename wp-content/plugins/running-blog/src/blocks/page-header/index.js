import { registerBlockType } from "@wordpress/blocks"
import {
  useBlockProps,
  RichText,
  InspectorControls
} from "@wordpress/block-editor"
import { PanelBody, ToggleControl } from "@wordpress/components"
import { __ } from "@wordpress/i18n"
import block from "./block.json"
import icons from "../../icons.js"

registerBlockType(block.name, {
  icon: icons.primary,
  edit({ attributes, setAttributes }) {
    const { content, showCategory } = attributes
    const blockProps = useBlockProps()
    return (
      <>
        <InspectorControls>
          <PanelBody title={__("General", "running-blog")}>
            <ToggleControl
              label={__("Show Header", "running-blog")}
              checked={showCategory}
              onChange={(showCategory) => setAttributes({ showCategory })}
              help={
                showCategory
                  ? __("Header shown", "running-blog")
                  : __("Custom content shown", "running-blog")
              }
            />
          </PanelBody>
        </InspectorControls>
        <div id="list-title" {...blockProps}>
          {showCategory ? (
            <h4 className="text-5xl marker light-text pb-2 border-b -mb-2 relative bottom-5">
              The Header
            </h4>
          ) : (
            <RichText
              className="text-5xl marker light-text pb-2 border-b -mb-2 relative bottom-5"
              tagName="h4"
              placeholder={__("Heading", "running-blog")}
              value={content}
              onChange={(content) => setAttributes({ content })}
            />
          )}
        </div>
      </>
    )
  }
})
