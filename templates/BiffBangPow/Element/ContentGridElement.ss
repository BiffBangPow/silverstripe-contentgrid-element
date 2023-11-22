<div class="container">
    <% if $Title && $ShowTitle %>
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4 element-title">$Title</h2>
            </div>
        </div>
    <% end_if %>

    <% if $Content %>
        <div class="row mb-4">
            <div class="col-12">
                $Content
                <% if $CTAType != 'None' %>
                    <div class="cta text-center my-4">
                        <p>
                            <a href="$CTALink" class="cta-link btn btn-outline-primary"
                                <% if $CTAType == 'External' %>target="_blank" rel="noopener"
                                <% else_if $CTAType == 'Download' %>download
                                <% end_if %>>
                                $LinkText
                            </a>
                        </p>
                    </div>
                <% end_if %>
            </div>
        </div>
    <% end_if %>


    <div class="row $GridClass mt-3">
        <% loop $ContentItems %>
            <div class="col mb-3">
                <% if $Title %>
                    <h3 class="griditem-title">$Title</h3>
                <% end_if %>
                $Content
                <% if $CTAType != 'None' %>
                    <div class="cta text-center my-4">
                        <p>
                            <a href="$CTALink" class="cta-link btn btn-outline-primary"
                                <% if $CTAType == 'External' %>target="_blank" rel="noopener"
                                <% else_if $CTAType == 'Download' %>download
                                <% end_if %>>
                                $LinkText
                            </a>
                        </p>
                    </div>
                <% end_if %>
            </div>
        <% end_loop %>
    </div>
</div>


