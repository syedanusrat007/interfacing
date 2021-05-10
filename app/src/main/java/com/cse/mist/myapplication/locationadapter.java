package com.cse.mist.myapplication;

/**
 * Created by Tonni on 29/04/2018.
 */

import android.content.Context;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import java.util.List;

/**
 * Created by ankit on 27/10/17.
 */

public class locationadapter extends RecyclerView.Adapter< locationadapter.ViewHolder> {

    private Context context;
    private List<location> list;

    public  locationadapter(Context context, List<location> list) {
        this.context = context;
        this.list = list;
    }

    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View v = LayoutInflater.from(context).inflate(R.layout.single_item, parent, false);
        return new ViewHolder(v);
    }

    @Override
    public void onBindViewHolder(ViewHolder holder, int position) {
        location movie = list.get(position);

        holder.textTitle.setText(movie.getId());
        holder.textRating.setText(String.valueOf(movie.getLat()));
        holder.textYear.setText(String.valueOf(movie.getLon()));

    }

    @Override
    public int getItemCount() {
        return list.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        public TextView textTitle, textRating, textYear;

        public ViewHolder(View itemView) {
            super(itemView);

            textTitle = itemView.findViewById(R.id.main_title);
            textRating = itemView.findViewById(R.id.main_rating);
            textYear = itemView.findViewById(R.id.main_year);
        }
    }

}