import { registerBlockType } from "@wordpress/blocks"
import { useBlockProps } from "@wordpress/block-editor"
import block from "./block.json"
import icons from "../../icons.js"

registerBlockType(block.name, {
  icon: icons.primary,
  edit() {
    const blockProps = useBlockProps()

    return (
      <div {...blockProps}>
        <form method="GET">
          <div className="relative focus-within:text-gray-400 float-right hidden lg:block">
            <span className="absolute inset-y-0 left-0 flex items-center pl-2">
              <button
                type="submit"
                className="p-1 focus:outline-none focus:shadow-outline"
              >
                <svg
                  fill="none"
                  stroke="#94a3b8"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  className="w-6 h-6"
                >
                  <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
              </button>
            </span>
            <input
              id="front-page-search-block"
              type="search"
              name="s"
              className="py-2 pr-2 outline-2 outline-slate-400 text-white bg-black/30 rounded-3xl pl-10"
              placeholder="Search"
              autocomplete="off"
            />
          </div>
        </form>
      </div>
    )
  }
})
