import icons from "../../icons.js"
import { registerPlugin } from "@wordpress/plugins"
import { PluginDocumentSettingPanel } from "@wordpress/edit-post"
import { useSelect, useDispatch } from "@wordpress/data"
import { useState } from "@wordpress/element"
import {
  PanelRow,
  ToggleControl,
  __experimentalNumberControl as NumberControl
} from "@wordpress/components"
import { __ } from "@wordpress/i18n"

const AddFeaturedPostSwitch = () => {
  const [featured, setFeatured] = useState(null)
  const [postType, setPostType] = useState(null)

  useSelect(
    (select) => {
      const { getEditedPostAttribute, getCurrentPostType, getCurrentPostId } =
        select("core/editor")

      if (postType === null && getCurrentPostType() === "post") {
        setPostType("post")
      }

      if (getCurrentPostType() === "post") {
        const { rb_featured } = getEditedPostAttribute("meta")

        // if we are just starting
        if (featured === null) {
          setFeatured(rb_featured)
        }
      }
    },
    [featured, postType]
  )

  const { editPost } = useDispatch("core/editor")

  if (postType !== "post") {
    return <></>
  }

  return (
    <PluginDocumentSettingPanel
      name="custom-panel"
      title={__("Featured Post", "running-blog")}
      className="running-blog-featured-post-panel"
    >
      <PanelRow>
        <ToggleControl
          label={__("Make a featured post", "running-blog")}
          help={__(
            "Toggling this makes post into a featured post",
            "running-blog"
          )}
          checked={featured}
          onChange={(value) => {
            setFeatured(value)
            editPost({
              meta: {
                rb_featured: value
              }
            })
          }}
        />
      </PanelRow>
    </PluginDocumentSettingPanel>
  )
}

// https://developer.wordpress.org/block-editor/reference-guides/slotfills/plugin-document-setting-panel/
// https://awhitepixel.com/blog/how-to-add-post-meta-fields-to-gutenberg-document-sidebar/
// https://wholesomecode.ltd/add-controls-to-the-post-sidebar-with-plugindocumentsettingpanel
registerPlugin("add-featured-post-switch", {
  render: AddFeaturedPostSwitch,
  icon: icons.primary
})
