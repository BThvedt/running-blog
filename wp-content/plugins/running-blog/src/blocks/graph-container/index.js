import { registerBlockType } from "@wordpress/blocks"
import {
  useBlockProps,
  InspectorControls,
  InnerBlocks
} from "@wordpress/block-editor"
import {
  PanelBody,
  RangeControl,
  SelectControl,
  TextControl
} from "@wordpress/components"
import block from "./block.json"
import { __ } from "@wordpress/i18n"
import icons from "../../icons.js"
import "./main.css"

registerBlockType(block.name, {
  icon: {
    src: icons.primary
  },
  edit({ attributes, setAttributes }) {
    const { title, columns } = attributes
    const blockProps = useBlockProps()

    return (
      <>
        <InspectorControls>
          <PanelBody title={__("Graph Containor", "running-blog")}>
            <TextControl
              label={__("Title", "running-blog")}
              value={title}
              onChange={(imageShape) => setAttributes({ title })}
            />
            <RangeControl
              label={__("Columns", "running-blog")}
              onChange={(columns) => setAttributes({ columns })}
              value={columns}
            />
          </PanelBody>
        </InspectorControls>
        <div {...blockProps}>
          <InnerBlocks
            orientation="horizontal"
            allowedBlocks={["running-blog/graph"]}
          />
        </div>
      </>
    )
  },
  save({ attributes }) {
    const blockProps = useBlockProps.save()

    return (
      <div {...blockProps}>
        <InnerBlocks.Content />
      </div>
    )
  }
})
