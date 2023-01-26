import { registerBlockType } from "@wordpress/blocks"
import {
  useBlockProps,
  InspectorControls,
  RichText
} from "@wordpress/block-editor"
import { __ } from "@wordpress/i18n"
import { PanelBody, QueryControls } from "@wordpress/components"
import { RawHTML } from "@wordpress/element"
import icons from "../../icons.js"
import "./main.css"
import { useSelect } from "@wordpress/data"
import block from "./block.json"
// front-page-featured-posts

registerBlockType(block.name, {
  icon: {
    src: icons.primary
  },
  edit({ attributes, setAttributes }) {
    const { title, count } = attributes
    const blockProps = useBlockProps()

    // console.log(posts)
    // https://wordpress.stackexchange.com/questions/328277/what-are-all-the-query-parameters-for-getentityrecords
    const posts = useSelect(
      (select) => {
        return select("core").getEntityRecords("postType", "post", {
          per_page: count,
          _embed: true
        })
      },
      [count]
    )

    // I guess this is only on backend so I don't gotta worry about perforamnce
    // just get all categories and all tags, and then find the ones by ID

    // categories
    const categories = useSelect(
      (select) => {
        return select("core").getEntityRecords("taxonomy", "category")
      },
      [count]
    )

    // tags
    const tags = useSelect(
      (select) => {
        return select("core").getEntityRecords("taxonomy", "post_tag")
      },
      [count]
    )

    return (
      <>
        <InspectorControls>
          <PanelBody title={__("Recent Posts", "running-blog")}>
            <QueryControls
              numberOfItems={count}
              minItems={1}
              maxItems={10}
              onNumberOfItemsChange={(count) => setAttributes({ count })}
            />
          </PanelBody>
        </InspectorControls>
        <div {...blockProps}>
          <RichText
            tagName="h6"
            value={title}
            withoutInteractiveFormatting
            onChange={(title) => setAttributes({ title })}
            placeholder={__("Title", "running-blog")}
          />
          <section id="front-page-latest-posts" class="md:w-[28%] md:px-4">
            <h3 class="text-xl font-bold border-b light-text pb-2">
              <a href="/posts" class="bold-link marker">
                {" "}
                Recent{" "}
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
                      const theCategoryInfo = categories?.find(
                        (categoryInfo) => {
                          return categoryInfo.id === categoryId
                        }
                      )

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
          </section>
        </div>
      </>
    )
  }
})
