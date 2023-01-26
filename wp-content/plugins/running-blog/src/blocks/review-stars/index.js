import { registerBlockType } from "@wordpress/blocks"
import block from "./block.json"
import icons from "../../icons.js"
import { registerPlugin } from "@wordpress/plugins"
import { useBlockProps } from "@wordpress/block-editor"
import {
  PluginSidebar,
  PluginSidebarMoreMenuItem,
  PluginDocumentSettingPanel
} from "@wordpress/edit-post"
import {
  Panel,
  PanelBody,
  PanelRow,
  __experimentalNumberControl as NumberControl
} from "@wordpress/components"
import { __ } from "@wordpress/i18n"
import StarRatings from "react-star-ratings"
import { useEntityProp } from "@wordpress/core-data"
import { useEntityRecord } from "@wordpress/core-data"
import { useSelect, dispatch } from "@wordpress/data"
import { useState } from "@wordpress/element"
// import { more } from "@wordpress/icons"
// import block from "./block.json"

registerBlockType(block.name, {
  icon: icons.primary,
  edit({ attributes, setAttributes, context }) {
    const { preptTime, cookTime, course } = attributes
    const blockProps = useBlockProps()
    const { postId } = context

    const [meta, setMeta] = useEntityProp("postType", "review", "meta")
    const { rating } = meta

    return (
      <div {...blockProps}>
        <StarRatings
          rating={rating}
          starRatedColor="blue"
          numberOfStars={6}
          isSelectable={false}
          name="rating"
        />
      </div>
    )
  }
})

const ReviewStarsPanel = () => {
  const [starRating, setStarRating] = useState(null)
  const [postType, setPostType] = useState(null)

  useSelect(
    (select) => {
      const { getEditedPostAttribute, getCurrentPostType, getCurrentPostId } =
        select("core/editor")

      if (postType === null && getCurrentPostType() === "review") {
        setPostType("review")
      }

      if (getCurrentPostType() === "review") {
        const { rating } = getEditedPostAttribute("meta")

        // if we are just starting
        if (starRating === null) {
          setStarRating(rating)
        }
      }
    },
    [starRating, postType]
  )

  if (postType !== "review") {
    console.log("bailing out")
    return <></>
  }

  return (
    <PluginDocumentSettingPanel
      name="rating-stars"
      title={__("Rating Stars", "running-blog")}
      className="running-blog-custom-panel"
    >
      <PanelRow>
        <NumberControl
          onChange={async (val) => {
            dispatch("core/editor").editPost({
              meta: {
                rating: parseFloat(val)
              }
            })
          }}
          step={0.5}
          min={0}
          max={6}
          value={starRating}
        />
      </PanelRow>
    </PluginDocumentSettingPanel>
  )
}

// https://developer.wordpress.org/block-editor/reference-guides/slotfills/plugin-document-setting-panel/
// https://awhitepixel.com/blog/how-to-add-post-meta-fields-to-gutenberg-document-sidebar/
// https://wholesomecode.ltd/add-controls-to-the-post-sidebar-with-plugindocumentsettingpanel
registerPlugin("review-stars", {
  render: ReviewStarsPanel,
  icon: icons.primary
})
