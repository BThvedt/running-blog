// https://www.ibenic.com/gutenberg-components-form-token-field/
import { registerBlockType } from "@wordpress/blocks"
import {
  useBlockProps,
  InspectorControls,
  RichText
} from "@wordpress/block-editor"
import { __ } from "@wordpress/i18n"
import { PanelBody, FormTokenField, PanelRow } from "@wordpress/components"
import { RawHTML, useState } from "@wordpress/element"
import { useSelect, useDispatch } from "@wordpress/data"
import { registerPlugin } from "@wordpress/plugins"
import { PluginDocumentSettingPanel } from "@wordpress/edit-post"
import block from "./block.json"
import icons from "../../icons.js"
import "./main.css"

// comment!

registerBlockType(block.name, {
  icon: icons.primary,
  edit({ attributes, setAttributes }) {
    const blockProps = useBlockProps()

    const { ids } = attributes

    const posts = useSelect(
      (select) => {
        return select("core").getEntityRecords("postType", "post", {
          include: ids,
          _embed: true,
          order: "desc"
        })
      },
      [ids]
    )

    // categories
    const categories = useSelect(
      (select) => {
        return select("core").getEntityRecords("taxonomy", "category")
      },
      [ids]
    )

    // tags
    const tags = useSelect(
      (select) => {
        return select("core").getEntityRecords("taxonomy", "post_tag")
      },
      [ids]
    )

    return (
      <>
        <InspectorControls>
          <PanelBody title={__("Related Posts", "running-blog")}>
            <FormTokenField
              label={__("Related Post Ids", "running-blog")}
              value={ids}
              onChange={(newIds) => {
                setAttributes({ ids: newIds })
              }}
            />
          </PanelBody>
        </InspectorControls>
        <div id="sidebar-related-posts" {...blockProps}>
          <h3 class="text-xl font-bold border-b light-text pb-2">
            <a href="" class="bold-link marker">
              {" "}
              Sidebar Related Posts{" "}
            </a>
          </h3>
          {posts?.map((post, index) => {
            const { tags: tagsIdsArray } = post
            const { categories: categoryIdsArray } = post

            const tagInfoArray =
              tags && tags.length
                ? tagsIdsArray.map((tagId) => {
                    const theTagInfo = tags?.find((tagInfo) => {
                      return tagInfo.id === tagId
                    })

                    return { name: theTagInfo?.name, link: theTagInfo?.link }
                  })
                : []

            const categoryInfoArray =
              categories && categories.length
                ? categoryIdsArray.map((categoryId) => {
                    const theCategoryInfo = categories?.find((categoryInfo) => {
                      return categoryInfo.id === categoryId
                    })

                    return {
                      name: theCategoryInfo?.name,
                      link: theCategoryInfo?.link
                    }
                  })
                : []

            return (
              <article
                className={`my-4 pb-4 ${
                  index !== posts.length - 1 ? "border-b" : ""
                }`}
              >
                <p className="float-right light-text handwriting">
                  {new Date(post.date).toLocaleDateString(undefined, {
                    month: "short",
                    day: "numeric"
                  })}
                </p>
                <h4>
                  {categoryInfoArray.map((categoryInfo) => {
                    return (
                      <a
                        href={categoryInfo.link}
                        className="light-text bold-link handwriting"
                      >
                        {categoryInfo.name}
                      </a>
                    )
                  })}
                </h4>
                <a href={post.link} className="hover:underline">
                  <h3 className="text-3xl article-title font-bold my-2">
                    <RawHTML>{post.title.rendered}</RawHTML>
                  </h3>
                  <div className="mb-2 text-lg">
                    <RawHTML>{post.excerpt.rendered}</RawHTML>
                  </div>
                </a>
                <p>
                  {tagInfoArray.map((tagInfo) => {
                    return (
                      <>
                        <a
                          href={tagInfo.link}
                          className="light-text subtle-site-link handwriting"
                        >
                          {tagInfo.name}
                        </a>{" "}
                      </>
                    )
                  })}
                </p>
              </article>
            )
          })}
        </div>
      </>
    )
  }
})

const AddRelatedSidebarPosts = () => {
  const [ids, setIds] = useState(null)
  const [postType, setPostType] = useState(null)

  const { editPost } = useDispatch("core/editor")

  useSelect(
    (select) => {
      const { getEditedPostAttribute, getCurrentPostType, getCurrentPostId } =
        select("core/editor")

      if (postType === null && getCurrentPostType() === "post") {
        setPostType("post")
      }

      if (getCurrentPostType() === "post") {
        const { rb_related } = getEditedPostAttribute("meta")

        // if we are just starting
        if (ids === null) {
          setIds(rb_related)
        }
      }
    },
    [ids, postType]
  )

  if (postType !== "post") {
    return <></>
  }

  return (
    <PluginDocumentSettingPanel
      name="custom-panel"
      title={__("Related Posts", "running-blog")}
      className="running-blog-featured-post-panel"
    >
      <PanelRow>
        <FormTokenField
          label={__("Related Post Ids", "running-blog")}
          value={ids}
          onChange={(newIds) => {
            setIds(newIds)
            editPost({
              meta: {
                rb_related: newIds
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
registerPlugin("add-related-sidebar-posts", {
  render: AddRelatedSidebarPosts,
  icon: icons.primary
})
